<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipe_ingredient".
 *
 * @property int $recipe_id
 * @property int $ingredient_id
 * @property int $quantity
 */
class RecipeIngredient extends \yii\db\ActiveRecord
{

    public function getRecipe()
{
    return $this->hasOne(Recipe::class, ['id' => 'recipe_id']);
}
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe_ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_id', 'ingredient_id', 'quantity'], 'required'],
            [['recipe_id', 'ingredient_id', 'quantity'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recipe_id' => Yii::t('app', 'Recipe ID'),
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
            'quantity' => Yii::t('app', 'Quantity'),
        ];
    }

    /**
     * TODO
     * Implementar as Relations
     */
}
