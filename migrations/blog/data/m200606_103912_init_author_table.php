<?php

namespace app\migrations\blog\data;

use yii\db\Migration;

/**
 * Class m200606_103912_init_author_table
 */
class m200606_103912_init_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%author}}', ['name' => 'Пушкин']);
        $this->insert('{{%author}}', ['name' => 'Есенин']);
        $this->insert('{{%author}}', ['name' => 'Некрасов']);
        $this->insert('{{%author}}', ['name' => 'Блок']);
        $this->insert('{{%author}}', ['name' => 'Тютчев']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200606_103912_init_author_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200606_103912_init_author_table cannot be reverted.\n";

        return false;
    }
    */
}
