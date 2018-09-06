<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examples Controller
 *
 * @property \App\Model\Table\ExamplesTable $Examples
 *
 * @method \App\Model\Entity\Example[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamplesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $examples = $this->paginate($this->Examples);

        $this->set(compact('examples'));
    }

    /**
     * View method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $example = $this->Examples->get($id, [
            'contain' => []
        ]);

        $this->set('example', $example);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $example = $this->Examples->newEntity();
        if ($this->request->is('post')) {
            $example = $this->Examples->patchEntity($example, $this->request->getData());
            if ($this->Examples->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The example could not be saved. Please, try again.'));
        }
        $this->set(compact('example'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $example = $this->Examples->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $example = $this->Examples->patchEntity($example, $this->request->getData());
            if ($this->Examples->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The example could not be saved. Please, try again.'));
        }
        $this->set(compact('example'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $example = $this->Examples->get($id);
        if ($this->Examples->delete($example)) {
            $this->Flash->success(__('The example has been deleted.'));
        } else {
            $this->Flash->error(__('The example could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
