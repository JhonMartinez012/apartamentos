<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReservaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idReserva') ?>

    <?= $form->field($model, 'codReserva') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'fecha_fin') ?>

    <?= $form->field($model, 'valorAdicionalPagar') ?>

    <?php // echo $form->field($model, 'valorTotalPagar') ?>

    <?php // echo $form->field($model, 'idApartamento') ?>

    <?php // echo $form->field($model, 'idCliente') ?>

    <?php // echo $form->field($model, 'idEstadoReserva') ?>

    <?php // echo $form->field($model, 'idTasaAdicional') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
