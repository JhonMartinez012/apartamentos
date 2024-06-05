<?php

use app\models\Tarifas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TarifaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tarifas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tarifa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTarifa',
            'valorTarifa',
            'fecha_inicio',
            'fecha_fin',
            'idTipoApartamento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tarifas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTarifa' => $model->idTarifa]);
                 }
            ],
        ],
    ]); ?>


</div>
