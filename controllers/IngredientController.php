<?php

namespace app\controllers;

use app\models\Ingredient;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class IngredientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $ingredients = Ingredient::find()->all();

        return $this->render('index', [
            'ingredients' => $ingredients
        ]);
    }

    /**
     * TODO
     * Implementar o CRUD
     */
        public function actionView($id)
        {
            throw new HttpException('501', 'É necessário implementar a VIEW dos Ingredientes.');
        }

    public function actionCreate()
    {
        $request = \yii::$app->request;

        if($request->isPost)
        {
        $model = new ingredient();

        //attributes é uma propriedade do active record ao passar $request->post() sem parametro exemplo $request->post('email') nem nada ele irá pegar todos os dados do post
        $model->attributes =  $request->post(); 
        //só grava se o m   etodo rules existir no modelo
        $model->save();           
        return $this->redirect(['ingredient/index']);

            }

        return $this->render('create');
     }


     public function actionUpdate($id)
     {
         $model = Ingredient::findOne($id);

         if(! $model)
         {
             throw new NotFoundHttpException("Página não encontrada");
         }

         $request = \yii::$app->request;
         
         if($request->isPost)
         {
         //attributes é uma propriedade do active record ao passar $request->post() sem parametro exemplo $request->post('email') nem nada ele irá pegar todos os dados do post
         $model->attributes =  $request->post(); 
         //irá identificar que o registro já existe
         $model->save();
         
         return $this->redirect(['ingredient/index']);

         }

         return $this->render('update', [
             'model' => $model
         ]);
     }

     public function actionDelete($id)
     {

         $model = Ingredient::findOne($id);

         if(! $model)
         {
             throw new NotFoundHttpException("Página não encontrada");
         }

         $model->delete();
         
         return $this->redirect(['ingredient/index']);
     }
}