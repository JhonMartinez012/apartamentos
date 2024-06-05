<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tarifas $model */

$this->title = $model->idTarifa;
$this->params['breadcrumbs'][] = ['label' => 'Tarifas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tarifas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTarifa' => $model->idTarifa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTarifa' => $model->idTarifa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTarifa',
            'valorTarifa',
            'fecha_inicio',
            'fecha_fin',
            'idTipoApartamento',
        ],
    ]) ?>

</div>
