<?php
use Symfony\Component\Console\Input\InputOption;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Tariffs page";
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Тарифы</h1>
    <a href="<?= Url::to(['admin/tariff/create']) ?>" id="admin-tariff-add" type="button" class="btn btn-success"
        style="margin-bottom: 21px">Добавить новый тариф</a>
    <div class="card mb-4">
        <div class="card-header">Тарифы</div>
        <div class="box">
            <div class="table-scroll">
                <table class="table">
                    <br>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Скорость</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody id="admin-tariff-table">
                        <?php foreach ($tariffs as $tariff): ?>
                            <tr id="<?= $tariff->id ?>">
                                <td>
                                    <?= Html::encode($tariff->id) ?>
                                </td>
                                <td>
                                    <?= Html::encode($tariff->name) ?>
                                </td>
                                <td>
                                    <?= Html::encode($tariff->description) ?>
                                </td>
                                <td>
                                    <?php $form = ActiveForm::begin([

                                        'action' => '/admin/tariff/test',
                                        'method' => 'post',
                                        'enableAjaxValidation' => false,
                                        'options' => [
                                            'class' => 'speed-edit-form',
                                        ],
                                    ]); ?>
                                    <input type="hidden" name="Tariff[id]" value="<?= Html::encode($tariff->id) ?>">
                                    <?= $form->field($tariff, 'speed', [
                                            'template' => "{input}\n{hint}\n{error}",
                                            'inputOptions' => [
                                                'id' => "tariff-speed-$tariff->id",
                                                'class' => 'form-control-plaintext tariff-speed-input',
                                                'disabled' => true,
                                            ]
                                        ]) ?>
                                    <?= Html::submitButton('сохранить', [
                                        'class' => 'btn btn-outline-secondary mb-3 tariff-speed-save',
                                        'hidden' => true,
                                    ]) ?>
                                    <?= Html::button('редактировать скорость', [
                                        'class' => 'btn btn-outline-secondary mb-3 tariff-speed-edit',
                                    ]) ?>
                                    <?php ActiveForm::end(); ?>
                                </td>
                                <td>
                                    <?= Html::encode($tariff->price) ?>
                                </td>
                                <td><a href="<?= Url::to(['admin/tariff/edit/', 'id' => $tariff->id]) ?>" type="button"
                                        class="btn btn-success">Редактировать</a>
                                    <a href="<?= Url::to(['admin/tariff/delete/', 'id' => $tariff->id]) ?>" type="button"
                                        class="btn btn-danger delete">Удалить</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerJsFile(
    '@web/js/ajax.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
