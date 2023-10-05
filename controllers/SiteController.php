<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Recipe;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Obter receitas disponíveis
        $availableRecipes = Recipe::getAvailableRecipes();
    
        // Renderizar a view com as receitas disponíveis
        return $this->render('index', [
            'availableRecipes' => $availableRecipes,
        ]);
    }
}
