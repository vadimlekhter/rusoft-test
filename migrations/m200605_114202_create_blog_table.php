<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%author}}`
 */
class m200605_114202_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'published' => $this->boolean(),
            'title' => $this->string(250),
            'text' => $this->text(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-blog-created_by}}',
            '{{%blog}}',
            'created_by'
        );

        // add foreign key for table `{{%author}}`
        $this->addForeignKey(
            '{{%fk-blog-created_by}}',
            '{{%blog}}',
            'created_by',
            '{{%author}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%author}}`
        $this->dropForeignKey(
            '{{%fk-blog-created_by}}',
            '{{%blog}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-blog-created_by}}',
            '{{%blog}}'
        );

        $this->dropTable('{{%blog}}');
    }
}
