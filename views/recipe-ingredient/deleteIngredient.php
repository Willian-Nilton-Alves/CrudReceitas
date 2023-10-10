<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Excluir Ingrediente';
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="recipe-ingredient-delete">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar', ['view', 'id' => $recipe->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($recipeIngredients, 'ingredient_id')->dropDownList(
        $ingredientReceita, ['prompt' => 'Selecione um ingrediente']
) ?>

    <div class="form-group">
        <?= Html::submitButton('Excluir', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
