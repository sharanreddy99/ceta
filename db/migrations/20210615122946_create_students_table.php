<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateStudentsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('students',['id' => false, 'primary_key' => ['sid','fname']]);
        $table->addColumn('sid', 'integer')
            ->addColumn('fname', 'string', ['limit' => 20])
            ->addColumn('lname', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('rollno', 'string', ['limit' => 11, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 40, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 30, 'null' => false])
            ->addColumn('mobile', 'string', ['limit' => 11, 'null' => false])
            ->addColumn('gender', 'string', ['limit' => 7, 'null' => false])
            ->addColumn('year', 'string', ['limit' => 9, 'null' => false])
            ->addColumn('branch', 'string', ['limit' => 6, 'null' => false])
            ->addColumn('profilepic', 'blob', ['limit' => MysqlAdapter::BLOB_REGULAR, 'null' => true, 'default' => null])
            ->addIndex(['rollno', 'email', 'mobile'], ['unique' => true,'name' => 'students_unique_1'])
            ->create();
    }

    public function down()
    {
        $this->table('students')->drop()->save();
    }
}
