<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Tariff create";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить тариф</h1>
</div>

<?php $form = ActiveForm::begin(); ?>

<div class="form-group mb-4">
    <?= $form->field($tariff, 'name')->label('Название') ?>
    <?= $form->field($tariff, 'description')->label('Описание') ?>
    <?= $form->field($tariff, 'price')->label('Цена') ?>
    <?= $form->field($tariff, 'speed')->label('Скорость') ?>
</div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-primary']) ?>

<?php ActiveForm::end(); ?>
