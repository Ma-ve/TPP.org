<?php

use Phinx\Migration\AbstractMigration;

class AddRunTouhoumon extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $this->insert('runs', [
            'gen' => 'III',
            'name' => 'Touhoumon',
            'short' => 'TH',
            'created_at' => '2016-05-18 20:00:00',
        ]);
    }

    public function down() {
        $this->execute('DELETE FROM runs WHERE short = "TH"');
    }
}
