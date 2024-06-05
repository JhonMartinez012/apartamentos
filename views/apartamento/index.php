<?php

use app\models\ApartamentoModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ApartamentoModelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Apartamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartamento-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir Apartamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idApartamento',
            'nombre',
            'direccion',
            'ciudad',
            'idTarifa',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ApartamentoModel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idApartamento' => $model->idApartamento]);
                 }
            ],
        ],
    ]); ?>


</div>
