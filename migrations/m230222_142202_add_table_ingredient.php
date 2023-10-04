<?php

use yii\db\Migration;

/**
 * Class m230222_142202_add_table_ingredient
 */
class m230222_142202_add_table_ingredient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ingredient', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ingredient');
    }
}