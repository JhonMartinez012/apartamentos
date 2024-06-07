<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;

use app\models\ApartamentoModel;
use app\models\Cliente;


/** @var yii\web\View $this */
/** @var app\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codReserva')->textInput(['maxlength' => true]) ?>

    <?php
    // obtengo el array de apartamentos
    $aApartamentos = ArrayHelper::map(ApartamentoModel::find()->all(), 'idApartamento', 'nombre');
    ?>

    <?= $form->field($model, 'idApartamento')->dropDownList($aApartamentos, [
        'prompt' => 'Seleccione el apartamento a reservar'
    ]) ?>

    <?php
    // obtengo el array de clientes
    $aClientes = ArrayHelper::map(\app\models\Cliente::find()->all(), 'idCliente', 'nombre');
    ?>

    <?= $form->field($model, 'idCliente')->dropDownList($aClientes,[
        'prompt' => 'Seleccione el cliente'
    ]) ?>


    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]);
    ?>

    <?= $form->field($model, 'fecha_fin')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]); ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>