<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
// ADDED Router and Inflector for CSV Downloads.
use Cake\Routing\Router;
use Cake\Utility\Inflector;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        // ADDED - CSV View class (see https://github.com/FriendsOfCake/cakephp-csvview )
        $this->loadComponent('RequestHandler', [
            'viewClassMap' => ['csv' => 'CsvView.Csv'
        ]]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        // ADDED - Global processing for Data Downloads ( see https://github.com/FriendsOfCake/cakephp-csvview )
        if ($this->request->params['_ext'] === 'csv') {
            $res_set = Inflector::underscore($this->request->params['controller']);

            if(empty($this->viewVars[$res_set])) {
                $set2 = lcfirst($this->request->params['controller']);
                if(!empty($this->viewVars[$set2])) {
                    $this->viewVars[$res_set] = $this->viewVars[$set2];
                }
            }

            if(!empty($this->viewVars[$res_set])) {
                $_serialize = $res_set;
                $model = $this->request->params['controller'];
                $cols = $this->$model->schema()->columns();
                $_header = [];
                $_extract = [];

                foreach($cols as $col) {
                    if(!empty($this->viewVars[$res_set]->first()[$col]) && $col != 'password') {
                        $_header[] = Inflector::humanize($col);
                        $_extract[] = $col;
                    }
                }

//                $_delimiter = chr(9); //tab
                $_delimiter = ','; //tab                
                $_enclosure = '"';
                $_newline = '\r\n';

                $this->set(compact('_serialize', '_header', '_extract', '_delimiter', '_enclosure', '_newline'));
            }
        }

    }



}
