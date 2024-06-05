<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TiposApartamentoModelSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tipos-apartamento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTipoApartamento') ?>

    <?= $form->field($model, 'tipoApartamento') ?>

    <?= $form->field($model, 'tipoAlquiler') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
