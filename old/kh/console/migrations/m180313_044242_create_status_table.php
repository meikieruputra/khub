<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m180313_044242_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull()->unique(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
        ]);

        $this->createIndex('status_index', 'status', ['id','title','created_at','updated_at','created_by', 'updated_by']); 
        $this->addForeignKey('fk_status_user_created_by', 'status', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_status_user_updated_by', 'status', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE'); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_status_user_created_by', 'status');
        $this->dropForeignKey('fk_status_user_updated_by', 'status');
        $this->dropTable('status');
    }
}
