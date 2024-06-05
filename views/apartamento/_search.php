<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApartamentoModelSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apartamento-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idApartamento') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'ciudad') ?>

    <?= $form->field($model, 'idTarifa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
