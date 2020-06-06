<?php

namespace app\migrations\blog\data;

use yii\db\Migration;

/**
 * Class m200606_104205_init_tag_table
 */
class m200606_104205_init_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%tag}}', ['name' => 'Tag_1']);
        $this->insert('{{%tag}}', ['name' => 'Tag_2']);
        $this->insert('{{%tag}}', ['name' => 'Tag_3']);
        $this->insert('{{%tag}}', ['name' => 'Tag_4']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200606_104205_init_tag_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200606_104205_init_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
