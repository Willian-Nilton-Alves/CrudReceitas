<?php
use yii\helpers\Html;
use yii\helpers\Url;  // Importe a classe Url para usar Url::to()

foreach ($availableRecipes as $recipe): ?>
    <div class="recipe-item" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <h2 class="recipe-name" style="color: #333;">
            <?= Html::a(Html::encode($recipe->name), ['view', 'id' => $recipe->id], ['class' => 'recipe-link']) ?>
        </h2>
        <h3 class="ingredient-heading">Ingredientes:</h3>
        <ul class="list-unstyled" style="margin: 0; padding: 0;">
            <?php foreach ($recipe->recipeIngredients as $recipeIngredient): ?>
                <?php
                $ingredient = $recipeIngredient->ingredient;
                $requiredQuantity = $recipeIngredient->quantity;
                $availabilityClass = $ingredient->isAvailable($requiredQuantity) ? 'text-success' : 'text-danger';
                ?>
                <li style="margin-bottom: 5px;">
                    <span class="<?= $availabilityClass ?>"><?= Html::encode($ingredient->name) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endforeach; ?>
