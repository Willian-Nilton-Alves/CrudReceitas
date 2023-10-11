<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


?>

<div class="recipe-ingredient-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList(
    ['' => 'Selecione um ingrediente'] + ArrayHelper::map(app\models\Ingredient::find()->all(), 'id', 'name'),
    ['options' => [$model->ingredient_id => ['selected' => true]], 'prompt' => '']
) ?>
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
