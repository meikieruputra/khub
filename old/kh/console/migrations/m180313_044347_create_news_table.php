<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m180313_044347_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->unique(),
            'slug' => $this->string(128) ->notNull()->unique(),
            'lead_photo' => $this->string(128),
            'lead_text' => $this->text(),
            'content' => $this->text()->notNull(),
            'meta_description' => $this->string(160),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'category_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),

        ]);

        $this->createIndex('news_index', 'news', ['title', 'created_at','updated_at','created_by', 'updated_by']);
        $this->addForeignKey('fk_news_category', 'news', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_news_user_created_by', 'news', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_news_user_updated_by', 'news', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_news_status_id', 'news', 'updated_by', 'status', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_news_category', 'news');
        $this->dropForeignKey('fk_news_user_created_by', 'news');
        $this->dropForeignKey('fk_news_user_updated_by', 'news');
        $this->dropForeignKey('fk_news_status_id', 'news');
        $this->dropTable('news');
    }
}
