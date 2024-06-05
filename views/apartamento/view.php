<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ApartamentoModel $model */

$this->title = $model->idApartamento;
$this->params['breadcrumbs'][] = ['label' => 'Apartamento Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="apartamento-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idApartamento' => $model->idApartamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idApartamento' => $model->idApartamento], [
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
            'idApartamento',
            'nombre',
            'direccion',
            'ciudad',
            'idTarifa',
            'idTipoApartamento'
        ],
    ]) ?>

</div>
