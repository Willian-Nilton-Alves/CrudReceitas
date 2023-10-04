<?php
    /* @var $this yii\web\View */
    use yii\helpers\Url;
    
    ?>
    <h1>Novo ingredient</h1>


    <form name="form" method="post" action="<?= Url::to(['ingredient/create']); ?>">

    <input type="hidden" name="<?= \yii::$app->request->csrfParam; ?>" 
                value="<?= \yii::$app->request->csrfToken; ?>">

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome do ingrediente">
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Informe a quantidade">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>