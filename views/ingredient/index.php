<?php
use yii\helpers\Url;
?>
<h1 class="text text-center">Ingredientes</h1>
<a href="<?= Url::to(['ingredient/create']);?>" class="btn btn-success">Novo Ingrediente</a>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>-</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($ingredients as $ingredient): ?>
            <tr>
                <td><?= $ingredient->id; ?></td>
                <td><?= $ingredient->name; ?></td>
                <td><?= $ingredient->quantity; ?></td>
                <td>
                <a href="<?= Url::to(['ingredient/update', 'id' => $ingredient->id]);?>"  class="btn btn-success">Editar</a>
                <a href="<?= Url::to(['ingredient/delete', 'id' => $ingredient->id]); ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>