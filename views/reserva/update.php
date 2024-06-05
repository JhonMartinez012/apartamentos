<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */

$this->title = 'Update Reserva: ' . $model->idReserva;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idReserva, 'url' => ['view', 'idReserva' => $model->idReserva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reserva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
