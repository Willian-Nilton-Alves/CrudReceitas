<?php

use yii\db\Migration;

/**
 * Class m230222_142137_add_table_recipe
 */
class m230222_142137_add_table_recipe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        $this->createTable('recipe', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('recipe');
        $this->update('sqlite_sequence', ['seq' => 0], ['name' => 'recipe']);
    }
}
