<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Editar Ingredientes: ' . $recipe->name;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $recipe->name, 'url' => ['view', 'id' => $recipe->id]];
$this->params['breadcrumbs'][] = 'Editar Ingredientes';

?>

<div class="recipe-update-ingredients">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantity')->textInput() ?>
    <?= $form->field($model, 'ingredientName')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
