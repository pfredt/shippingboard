<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HotTubModels */

$this->title = $model->hot_tub_model_id;
$this->params['breadcrumbs'][] = ['label' => 'Hot Tub Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hot-tub-models-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hot_tub_model_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hot_tub_model_id], [
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
            'hot_tub_model_id',
            'hot_tub_model_name',
        ],
    ]) ?>

</div>
