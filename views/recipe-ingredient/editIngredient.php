<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ingredient; // Certifique-se de que o namespace está correto

/* @var $this yii\web\View */
/* @var $model app\models\RecipeIngredient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-ingredient-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList(
        ArrayHelper::map(Ingredient::find()->all(), 'id', 'name'),
        ['prompt' => 'Selecione um ingrediente']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>