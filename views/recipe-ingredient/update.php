<?php

use yii\helpers\Html;

$this->title = 'Editar Ingredientes';
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recipe->name, 'url' => ['view', 'id' => $model->recipe_id]];
$this->params['breadcrumbs'][] = 'Editar Ingredientes';
?>

<div class="recipe-ingredient-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
