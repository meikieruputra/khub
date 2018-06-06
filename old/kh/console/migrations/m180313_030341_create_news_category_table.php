<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180313_030341_create_news_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'slug' => $this->string(64)->notNull()->unique(),
            'meta_description' => $this->string(160),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
        ]);

        $this->createIndex('news_category_index', 'news_category', ['id','name', 'created_at','updated_at','created_by', 'updated_by']);
        $this->addForeignKey('fk_news_category_created_by', 'news_category', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_news_category_user_updated_by', 'news_category', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_news_category_user_created_by', 'news_category');
        $this->dropForeignKey('fk_news_category_user_updated_by', 'news_category');
        $this->dropTable('news_category');
    }
}
