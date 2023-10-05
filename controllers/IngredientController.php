<?php

namespace app\controllers;

use app\models\Ingredient;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class IngredientController extends Controller
{



    /**
     * Mostra a lista de todos os ingredientes.
     */
    public function actionIndex()
    {
        // Obtém todos os ingredientes do banco de dados
        $ingredients = Ingredient::find()->all();

        // Renderiza a view 'index' e passa a lista de ingredientes para a view
        return $this->render('index', [
            'ingredients' => $ingredients
        ]);
    }





    /**
     * Ação para exibir detalhes de um ingrediente específico (ainda não implementada).
     */
    public function actionView($id)
    {
        throw new HttpException('501', 'É necessário implementar a VIEW dos Ingredientes.');
    }





    /**
     * Cria um novo ingrediente.
     */
    public function actionCreate()
    {
        $request = \yii::$app->request;

        if($request->isPost)
        {
            // Cria uma nova instância do modelo Ingredient
            $model = new ingredient();

            // Atribui os dados do POST ao modelo
            $model->attributes =  $request->post(); 

            // Salva o modelo no banco de dados
            $model->save();           

            // Redireciona para a lista de ingredientes
            return $this->redirect(['ingredient/index']);
        }

        // Renderiza a view 'create'
        return $this->render('create');
    }






    /**
     * Atualiza um ingrediente existente.
     */
    public function actionUpdate($id)
    {
        // Encontra o modelo do ingrediente com base no ID
        $model = Ingredient::findOne($id);

        if(! $model)
        {
            // Se o modelo não for encontrado, lança uma exceção indicando que a página não foi encontrada
            throw new NotFoundHttpException("Página não encontrada");
        }

        $request = \yii::$app->request;
        
        if($request->isPost)
        {
            // Atribui os dados do POST ao modelo
            $model->attributes =  $request->post(); 

            // Salva as alterações no modelo
            $model->save();
            
            // Redireciona para a lista de ingredientes
            return $this->redirect(['ingredient/index']);
        }

        // Renderiza a view 'update' com o modelo do ingrediente
        return $this->render('update', [
            'model' => $model
        ]);
    }







    /**
     * Exclui um ingrediente.
     */
    public function actionDelete($id)
    {
        // Encontra o modelo do ingrediente com base no ID
        $model = Ingredient::findOne($id);

        if(! $model)
        {
            // Se o modelo não for encontrado, lança uma exceção indicando que a página não foi encontrada
            throw new NotFoundHttpException("Página não encontrada");
        }

        // Exclui o modelo do banco de dados
        $model->delete();
        
        // Redireciona para a lista de ingredientes
        return $this->redirect(['ingredient/index']);
    }
}
