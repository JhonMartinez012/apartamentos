<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TiposApartamento $model */

$this->title = 'Update Tipos Apartamento: ' . $model->idTipoApartamento;
$this->params['breadcrumbs'][] = ['label' => 'Tipos Apartamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoApartamento, 'url' => ['view', 'idTipoApartamento' => $model->idTipoApartamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipos-apartamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
