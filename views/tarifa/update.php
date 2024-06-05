<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tarifas $model */

$this->title = 'Update Tarifas: ' . $model->idTarifa;
$this->params['breadcrumbs'][] = ['label' => 'Tarifas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTarifa, 'url' => ['view', 'idTarifa' => $model->idTarifa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarifas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
