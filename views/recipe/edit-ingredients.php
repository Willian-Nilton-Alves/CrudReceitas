<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $recipe app\models\Recipe */
/* @var $recipeIngredients app\models\RecipeIngredient[] */

$this->title = 'Editar Ingredientes: ' . $recipe->name;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $recipe->name, 'url' => ['view', 'id' => $recipe->id]];
$this->params['breadcrumbs'][] = 'Editar Ingredientes';
?>
<div class="recipe-edit-ingredients">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Ingredientes:</h2>
    <ul>
        <?php foreach ($recipeIngredients as $recipeIngredient): ?>
            <li>
                <?= $recipeIngredient->quantity ?> <?= $recipeIngredient->ingredient->name ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
        <?= Html::a('Voltar', ['view', 'id' => $recipe->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Editar', ['recipe-ingredient/update', 'recipe_id' => $recipe->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
