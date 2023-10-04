<?php

use yii\db\Migration;

/**
 * Class m230222_142211_add_table_recipe_ingredient
 */
class m230222_142211_add_table_recipe_ingredient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = 'PRAGMA foreign_keys = ON;';
        $this->execute($sql);

        $tableOptions = null;
        $this->createTable('recipe_ingredient', [
            'recipe_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'FOREIGN KEY (recipe_id) REFERENCES recipe(i    d)',
            'FOREIGN KEY (ingredient_id) REFERENCES ingredient(id)',
            'PRIMARY KEY (recipe_id, ingredient_id)',
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('recipe_ingredient');
    }
}
;