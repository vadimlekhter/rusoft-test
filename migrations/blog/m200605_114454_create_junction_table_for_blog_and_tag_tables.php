<?php

namespace app\migrations\blog;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog_tag}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%blog}}`
 * - `{{%tag}}`
 */
class m200605_114454_create_junction_table_for_blog_and_tag_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_tag}}', [
            'id' => $this->primaryKey(),
            'blog_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        // creates index for column `blog_id`
        $this->createIndex(
            '{{%idx-blog_tag-blog_id}}',
            '{{%blog_tag}}',
            'blog_id'
        );

        // add foreign key for table `{{%blog}}`
        $this->addForeignKey(
            '{{%fk-blog_tag-blog_id}}',
            '{{%blog_tag}}',
            'blog_id',
            '{{%blog}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-blog_tag-tag_id}}',
            '{{%blog_tag}}',
            'tag_id'
        );

        // add foreign key for table `{{%tag}}`
        $this->addForeignKey(
            '{{%fk-blog_tag-tag_id}}',
            '{{%blog_tag}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%blog}}`
        $this->dropForeignKey(
            '{{%fk-blog_tag-blog_id}}',
            '{{%blog_tag}}'
        );

        // drops index for column `blog_id`
        $this->dropIndex(
            '{{%idx-blog_tag-blog_id}}',
            '{{%blog_tag}}'
        );

        // drops foreign key for table `{{%tag}}`
        $this->dropForeignKey(
            '{{%fk-blog_tag-tag_id}}',
            '{{%blog_tag}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-blog_tag-tag_id}}',
            '{{%blog_tag}}'
        );

        $this->dropTable('{{%blog_tag}}');
    }
}
