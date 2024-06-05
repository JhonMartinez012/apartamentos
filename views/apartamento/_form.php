<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Tarifas;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\ApartamentoModel $model */
/** @var yii\widgets\ActiveForm $form */
/** @var $aTiposList  array */
?>


<div class="apartamento-model-form">


    <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>
    
    <?php
        $Tarifas = Tarifas::find()->all();
        $aTarifasList = ArrayHelper::map($Tarifas, 'idTarifa', 'valorTarifa');
    ?>

    <?= $form->field($model, 'idTarifa')->dropDownList($aTarifasList,['prompt' => 'Seleccione Uno']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
