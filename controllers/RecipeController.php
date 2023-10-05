<?php

namespace app\controllers;

use app\models\RecipeIngredient;  // Certifique-se de importar a classe corretamente
use yii\data\ActiveDataProvider;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\Recipe;
use yii\web\NotFoundHttpException;
use app\models\Ingredient;
use yii\bootstrap\Alert;

class RecipeController extends Controller
{

 

    public function actionAddIngredient($id)
    {
        $recipe = Recipe::findOne($id);
    
        if ($recipe === null) {
            throw new NotFoundHttpException('Receita não encontrada.');
        }
    
        $model = new RecipeIngredient();
        $model->recipe_id = $recipe->id;
    
        if ($model->load(Yii::$app->request->post())) {
            // Verifica se o ingrediente já está associado a essa receita
            $existingIngredient = RecipeIngredient::findOne(['recipe_id' => $recipe->id, 'ingredient_id' => $model->ingredient_id]);
            if ($existingIngredient !== null) {
                // Exibe um alerta indicando que o ingrediente já está associado à receita
                Yii::$app->session->setFlash('danger', 'Esse ingrediente já está associado a essa receita.');
                return $this->redirect(['view', 'id' => $id]);
            } else {
                // Adiciona o novo ingrediente à receita
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Ingrediente adicionado com sucesso.');
                    return $this->redirect(['view', 'id' => $id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Ocorreu um erro ao adicionar o ingrediente.');
                }
            }
        }
    
        return $this->render('@app/views/recipe-ingredient/addIngredient', [
            'model' => $model,
            'recipe' => $recipe,
        ]);
    }

    


    public function actionEditIngredient($id)
    {
        // Encontre o modelo da relação RecipeIngredient pelo ID
        $model = RecipeIngredient::findOne($id);
    
        // Verifique se o modelo foi encontrado
        if ($model === null) {
            throw new NotFoundHttpException('O ingrediente não foi encontrado.');
        }
    
        // Carregue o modelo do ingrediente associado
        $ingredientModel = $model->ingredient;
    
        // Renderize a view de edição com o modelo de relação e o modelo do ingrediente
        return $this->render('@app/views/recipe-ingredient/editIngredient', [
            'model' => $model,
            'ingredientModel' => $ingredientModel,
        ]);
    }



public function validateIngredientId()
{
    $ingredient = Ingredient::findOne($this->ingredient_id);

    if (!$ingredient) {
        $this->addError('ingredient_id', 'Ingrediente não válido.');
    }
}

public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        $this->validateIngredientId();
        return !$this->hasErrors();
    }
    return false;
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
    ]);

    return $this->render('index', [
        'dataProvider' => $dataProvider,
    ]);

    
}

public function actionView($id)
{
    $recipe = $this->findModel($id);
    $recipeIngredients = $recipe->recipeIngredients; // Obtém os ingredientes da receita

    return $this->render('view', [
        'recipe' => $recipe,
        'recipeIngredients' => $recipeIngredients,  // Passa os ingredientes para a view
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
        Yii::$app->session->setFlash('success', 'As alterações foram salvas com sucesso.');
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

