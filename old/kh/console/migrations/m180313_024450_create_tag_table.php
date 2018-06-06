<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m180313_024450_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
        ]);

        $this->createIndex('tag_index', 'tag', ['id','name','created_at','updated_at','created_by', 'updated_by']); 
        $this->addForeignKey('fk_tag_user_created_by', 'tag', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_tag_user_updated_by', 'tag', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE'); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tag_user_created_by', 'tag');
        $this->dropForeignKey('fk_tag_user_updated_by', 'tag');
        $this->dropTable('tag');
    }
}
