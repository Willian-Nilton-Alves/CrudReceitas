<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="recipe-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Receita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'ingredientes',
                'label' => 'Ingredientes',
                'value' => function ($model) {
                    $ingredientes = [];
                    foreach ($model->recipeIngredients as $recipeIngredient) {
                        $ingredientes[] = $recipeIngredient->ingredient->name . ' (' . $recipeIngredient->quantity . ')';
                    }
                    return implode(', ', $ingredientes);
                },
                'format' => 'raw',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add-ingredient}', // Adicionando botão customizado
                'buttons' => [
                    
                    'view' => function ($url, $model, $key) {
                        return Html::a('Visualizar', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Excluir', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Tem certeza que deseja excluir esta receita?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'add-ingredient' => function ($url, $model, $key) {
                        return Html::a('Adicionar Ingredientes', ['add-ingredient', 'id' => $model->id], ['class' => 'btn btn-success']);
                    },
                    
                    
                ],
            ],
        ],
    ]); ?>
</div>
