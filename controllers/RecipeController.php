<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\HttpException;


class RecipeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        throw new HttpException('501', 'É necessário implementar a VIEW das Receitas.');
    }

    /**
     * TODO
     * Implementar o CRUD
     */
    public function actionView($id)
    {
        throw new HttpException('501', 'É necessário implementar a VIEW das Receitas.');
    }

    public function actionCreate()
    {
        throw new HttpException('501', 'É necessário implementar a VIEW das Receitas.');
    }

    public function actionUpdate($id)
    {
        throw new HttpException('501', 'É necessário implementar a VIEW das Receitas.');
    }

    public function actionDelete()
    {
        throw new HttpException('501', 'É necessário implementar a VIEW das Receitas.');
    }
}
