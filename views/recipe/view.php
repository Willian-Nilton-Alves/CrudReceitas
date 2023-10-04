<?php

use yii\helpers\Html;

$this->title = $recipe->name;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="recipe-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Ingredientes:</h2>
    <ul>
        <?php foreach ($recipeIngredients as $recipeIngredient): ?>
            <li>
                <?= $recipeIngredient->quantity ?> <?= $recipeIngredient->ingredient->name ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?= Html::a('Editar Ingredientes', ['update-ingredients', 'id' => $recipe->id], ['class' => 'btn btn-primary']) ?>
</div>
