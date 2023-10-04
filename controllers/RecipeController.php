<?php

namespace app\controllers;

use app\models\RecipeIngredient;  // Certifique-se de importar a classe corretamente
use yii\data\ActiveDataProvider;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\Recipe;
use app\models\RecipeSearch;
use yii\web\NotFoundHttpException;
class RecipeController extends Controller
{

    public function actionUpdateIngredients($id)
{
    $recipe = Recipe::findOne($id);

    if ($recipe === null) {
        throw new NotFoundHttpException('Receita não encontrada.');
    }

    $recipeIngredients = $recipe->recipeIngredients;

    // Crie uma nova instância de RecipeIngredient
    $model = new RecipeIngredient();

    // Lógica para editar ingredientes
    // Aqui você pode implementar a funcionalidade para editar ingredientes

    return $this->render('updateIngredients', [
        'recipe' => $recipe,
        'recipeIngredients' => $recipeIngredients,
        'model' => $model,  // Passe o modelo para a view
    ]);
}

    

    public function getRecipe()
    {
        return $this->hasOne(Recipe::class, ['id' => 'recipe_id']);
    }

    public function getIngredient()
    {
        return $this->hasOne(Ingredient::class, ['id' => 'ingredient_id']);
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Recipe::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $recipe = Recipe::findOne($id);

        if ($recipe === null) {
            throw new NotFoundHttpException('Receita não encontrada.');
        }

        $recipeIngredients = $recipe->recipeIngredients;

        return $this->render('view', [
            'recipe' => $recipe,
            'recipeIngredients' => $recipeIngredients,
        ]);
    }

    public function actionCreate()
    {
        $model = new Recipe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $recipe = Recipe::findOne($id);

        if ($recipe === null) {
            throw new NotFoundHttpException('Receita não encontrada.');
        }

        $recipe->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Recipe::findOne($id)) !== null) {
            return $model;
        }

        throw new HttpException(404, 'Receita não encontrada.');
    }
}

