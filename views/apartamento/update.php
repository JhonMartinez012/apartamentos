<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ApartamentoModel $model */

$this->title = 'Update Apartamento Model: ' . $model->idApartamento;
$this->params['breadcrumbs'][] = ['label' => 'Apartamento Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idApartamento, 'url' => ['view', 'idApartamento' => $model->idApartamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartamento-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
