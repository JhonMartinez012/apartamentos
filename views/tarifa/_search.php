<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TarifaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tarifas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTarifa') ?>

    <?= $form->field($model, 'valorTarifa') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'fecha_fin') ?>

    <?= $form->field($model, 'idTipoApartamento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
