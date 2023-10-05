<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Recipe;

$availableRecipes = Recipe::getAvailableRecipes();
$unavailableRecipes = Recipe::getUnavailableRecipes();

$availableRecipesHtml = ''; // Inicializa a variável para armazenar as receitas disponíveis
$unavailableRecipesHtml = ''; // Inicializa a variável para armazenar as receitas não disponíveis

foreach ($availableRecipes as $recipe) {
    $recipeHtml = '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 10px; background-color: #D9EAD3;">';
    $recipeHtml .= '<h3 style="color: #333;">';
    $recipeHtml .= Html::a(Html::encode($recipe->name), Url::to(['recipe/view', 'id' => $recipe->id]), ['class' => 'recipe-link']);
    $recipeHtml .= '</h3>';
    $recipeHtml .= '<h4>Ingredientes:</h4>';
    $recipeHtml .= '<div style="display: flex; flex-wrap: wrap;">';
    foreach ($recipe->recipeIngredients as $recipeIngredient) {
        $ingredient = $recipeIngredient->ingredient;
        $requiredQuantity = $recipeIngredient->quantity;
        $recipeHtml .= '<span style="display: inline-block; margin-right: 10px; margin-bottom: 10px; padding: 5px; border: 1px solid #ccc; border-radius: 5px; background-color: #F0FFF0;">';
        $recipeHtml .= Html::encode($ingredient->name) . ' - ' . Html::encode($requiredQuantity) . ' unidades';
        $recipeHtml .= '</span>';
    }
    $recipeHtml .= '</div></div>';
    $availableRecipesHtml .= $recipeHtml;
}

foreach ($unavailableRecipes as $recipe) {
    $recipeHtml = '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 10px; background-color: #FADBD8;">';
    $recipeHtml .= '<h3 style="color: #333;">';
    $recipeHtml .= Html::a(Html::encode($recipe->name), Url::to(['recipe/view', 'id' => $recipe->id]), ['class' => 'recipe-link']);
    $recipeHtml .= '</h3>';
    $recipeHtml .= '<h4>Ingredientes:</h4>';
    $recipeHtml .= '<div style="display: flex; flex-wrap: wrap;">';
    foreach ($recipe->recipeIngredients as $recipeIngredient) {
        $ingredient = $recipeIngredient->ingredient;
        $requiredQuantity = $recipeIngredient->quantity;
        $recipeHtml .= '<span style="display: inline-block; margin-right: 10px; margin-bottom: 10px; padding: 5px; border: 1px solid #ccc; border-radius: 5px; background-color: #FFEBEE;">';
        $recipeHtml .= Html::encode($ingredient->name) . ' - ' . Html::encode($requiredQuantity) . ' unidades';
        $recipeHtml .= '</span>';
    }
    $recipeHtml .= '</div></div>';
    $unavailableRecipesHtml .= $recipeHtml;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Suas Receitas</title>
</head>
<body>

<div style="width: 45%; float: left; padding: 20px;">
    <h2 style="color: #4CAF50;">Receitas Disponíveis:</h2>
    <?= $availableRecipesHtml ?>
</div>

<div style="width: 45%; float: right; padding: 20px;">
    <h2 style="color: #F44336;">Não Disponíveis:</h2>
    <?= $unavailableRecipesHtml ?>
</div>

</body>
</html>
