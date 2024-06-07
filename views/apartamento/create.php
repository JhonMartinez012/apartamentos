<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ApartamentoModel $model */

$this->title = 'Create Apartamento';
$this->params['breadcrumbs'][] = ['label' => 'Apartamento Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartamento-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'aTiposList' => $aTiposList
    ]) ?>

</div>
