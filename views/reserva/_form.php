<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codReserva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <?= $form->field($model, 'idApartamento')->textInput() ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
