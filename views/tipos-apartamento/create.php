<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TiposApartamento $model */

$this->title = 'Create Tipos Apartamento';
$this->params['breadcrumbs'][] = ['label' => 'Tipos Apartamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-apartamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
