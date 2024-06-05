<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TiposApartamento $model */

$this->title = $model->idTipoApartamento;
$this->params['breadcrumbs'][] = ['label' => 'Tipos Apartamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipos-apartamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTipoApartamento' => $model->idTipoApartamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTipoApartamento' => $model->idTipoApartamento], [
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
            'idTipoApartamento',
            'tipoApartamento',
            'tipoAlquiler',
        ],
    ]) ?>

</div>
