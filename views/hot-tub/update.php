<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HotTubModels */

$this->title = 'Update Hot Tub Models: ' . ' ' . $model->hot_tub_model_id;
$this->params['breadcrumbs'][] = ['label' => 'Hot Tub Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hot_tub_model_id, 'url' => ['view', 'id' => $model->hot_tub_model_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hot-tub-models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
