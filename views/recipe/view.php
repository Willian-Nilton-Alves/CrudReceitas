<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $recipe->name;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="recipe-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Botões para Adicionar e Editar Ingredientes -->
    <p>
        <?= Html::a('Adicionar Ingrediente', ['add-ingredient', 'id' => $recipe->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Editar Ingrediente', ['edit-ingredient', 'id' => $recipe->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <!-- Detalhes da Receita -->
    <?= DetailView::widget([
        'model' => $recipe,
        'attributes' => [
            'id',
            'name',
            // Outros atributos da receita, se houver
        ],
    ]) ?>

    <!-- Exibir os ingredientes da receita -->
    <h2>Ingredientes:</h2>
    <ul>
        <?php foreach ($recipeIngredients as $recipeIngredient): ?>
            <li>
                <?= $recipeIngredient->ingredient->name ?> - <?= $recipeIngredient->quantity ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
