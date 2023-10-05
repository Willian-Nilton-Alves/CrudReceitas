<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Adicionar Ingrediente à Receita: ' . ($recipe ? Html::encode($recipe->name) : 'Nome não disponível');
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $recipe->name ?? 'Nome não disponível', 'url' => ['view', 'id' => $recipe->id]];
$this->params['breadcrumbs'][] = 'Adicionar Ingrediente';

?>

<div class="recipe-ingredient-add">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($recipe && $recipe->hasAttribute('name')): ?>
        <?= $form->field($model, 'ingredient_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Ingredient::find()->all(), 'id', 'name'),
            ['prompt' => 'Selecione um ingrediente']
        ) ?>
        <?= $form->field($model, 'quantity')->textInput() ?>
    <?php else: ?>
        <p>Receita não encontrada.</p>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Adicionar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
