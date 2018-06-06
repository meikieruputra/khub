<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_tag`.
 */
class m180313_044424_create_news_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_tag', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('news_tag_index', 'news_tag',['news_id','tag_id']);
        $this->addForeignKey('fk_news_tag_post', 'news_tag', 'news_id', 'news', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_news_tag_tag', 'news_tag', 'tag_id', 'tag', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_news_tag_post', 'news_tag');
        $this->dropForeignKey('fk_post_news_tag', 'news_tag');
        $this->dropTable('news_tag');
    }
}
