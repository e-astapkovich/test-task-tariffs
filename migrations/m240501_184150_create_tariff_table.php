<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tariff}}`.
 */
class m240501_184150_create_tariff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tariff}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->text(),
            'speed' => $this->integer()->notNull()->defaultValue(1),
            'price' => $this->decimal(11,2)->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tariff}}');
    }
}
