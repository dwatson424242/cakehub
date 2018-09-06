<?php
use Migrations\AbstractMigration;

class Examples extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {

        // create the table
        $table = $this->table('examples');
        $table->addColumn('id', 'integer')
              ->addColumn('first_name', 'string', ['limit' => 30])
              ->addColumn('last_name', 'string', ['limit' => 30])
              ->addColumn('address', 'string', ['limit' => 255])
              ->addColumn('city', 'string', ['limit' => 30])
              ->addColumn('state', 'string', ['limit' => 10])
              ->addColumn('zip', 'string', ['limit' => 10])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('created', 'datetime')
              ->create();

    }
}
