<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property string $name
 */
class Recipe extends \yii\db\ActiveRecord
{

    public function getRecipeIngredients()
{
    return $this->hasMany(RecipeIngredient::class, ['recipe_id' => 'id']);
}
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
    public function hasIngredient($ingredientId)
    {
        foreach ($this->recipeIngredients as $recipeIngredient) {
            if ($recipeIngredient->ingredient_id == $ingredientId) {
                return true;
            }
        }
        return false;
    }
public function getIngredients()
{
    return $this->hasMany(Ingredient::class, ['id' => 'ingredient_id'])
        ->viaTable('recipe_ingredient', ['recipe_id' => 'id']);
}

public function isAvailable()
{
    // Implemente a lógica para verificar a disponibilidade da receita com base nos ingredientes.
    // Aqui, usaremos uma lógica de exemplo onde consideramos a receita disponível se tiver algum ingrediente associado.
    return count($this->recipeIngredients) > 0;
}


// Recipe.php

public static function getAvailableRecipes()
{
    $availableRecipes = [];

    // Obtém todas as receitas
    $recipes = Recipe::find()->all();

    foreach ($recipes as $recipe) {
        $ingredients = $recipe->recipeIngredients;
        $isAvailable = true;

        foreach ($ingredients as $recipeIngredient) {
            $ingredient = $recipeIngredient->ingredient;
            $requiredQuantity = $recipeIngredient->quantity;

            if ($ingredient->quantity < $requiredQuantity) {
                // Ingrediente não disponível em estoque suficiente
                $isAvailable = false;
                break;
            }
        }

        if ($isAvailable) {
            $availableRecipes[] = $recipe;
        }
    }

    return $availableRecipes;
}


public function hasSufficientIngredients()
{
    foreach ($this->recipeIngredients as $recipeIngredient) {
        $ingredient = $recipeIngredient->ingredient;
        $requiredQuantity = $recipeIngredient->quantity;

        if ($ingredient->quantity < $requiredQuantity) {
            return false;
        }
    }

    return true;
}



    
}
