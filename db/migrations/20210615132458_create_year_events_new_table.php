<?php

use Phinx\Migration\AbstractMigration;

class CreateYearEventsNewTable extends AbstractMigration
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
        $table = $this->table('yreventsnew',['id' => false, 'primary_key' => ['eid']]);
        $table->addColumn('eid', 'integer')
            ->addColumn('year', 'string', ['limit' => 9, 'null' => false])
            ->addForeignKey('eid','eventsnew','eid',['delete'=> 'CASCADE'])
            ->create();
    }

    public function down()
    {
        $this->table('yreventsnew')->dropForeignKey('eid')->drop()->save();
    }
}
