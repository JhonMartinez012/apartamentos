<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TiposApartamento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tipos-apartamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipoApartamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoAlquiler')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
