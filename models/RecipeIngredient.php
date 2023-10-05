<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipe_ingredient".
 *
 * @property int $recipe_id
 * @property int $ingredient_id
 * @property int $quantity
 *
 * @property Recipe $recipe
 * @property Ingredient $ingredient
 */
class RecipeIngredient extends \yii\db\ActiveRecord
{
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
            [['recipe_id', 'ingredient_id', 'quantity'], 'safe'],
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
     * Define a relação com o modelo de Ingrediente (caso exista)
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::class, ['id' => 'ingredient_id']);
    }

    /**
     * Define a relação com o modelo de Receita (caso exista)
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::class, ['id' => 'recipe_id']);
    }
}
