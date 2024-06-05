<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\TiposApartamento;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Tarifas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tarifas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valorTarifa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],

    ])

    ?>

    <?= $form->field($model, 'fecha_fin')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],

    ]) ?>

    <?php

    $tiposApartamento = ArrayHelper::map(TiposApartamento::find()->all(), 'idTipoApartamento', 'tipoApartamento');
    ?>

    <?= $form->field($model, 'idTipoApartamento')->dropDownList($tiposApartamento, ['prompt' => 'Seleccione Uno']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>