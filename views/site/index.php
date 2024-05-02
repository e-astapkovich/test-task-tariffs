<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Tariffs home';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome, <?= Yii::$app->user->identity->username ?>!</h1>
        <a class="btn btn-lg btn-success" href="<?= Url::to(['admin/tariff']) ?>">Перейти в админку</a></p>
        <!-- <p class="lead"></p> -->
    </div>
</div>
