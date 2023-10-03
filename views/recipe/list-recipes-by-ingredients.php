<?php

/* @var $this yii\web\View */
/* @var $recipes app\models\Recipe[] */

use yii\helpers\Html;

$this->title = 'Receitas com Ingredientes';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<ul>
    <?php foreach ($recipes as $recipe) : ?>
        <li><?= Html::encode($recipe->name) ?></li>
    <?php endforeach; ?>
</ul>
