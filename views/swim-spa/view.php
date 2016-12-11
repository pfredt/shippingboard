<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SwimSpaModels */

$this->title = $model->swim_spa_model_id;
$this->params['breadcrumbs'][] = ['label' => 'Swim Spa Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="swim-spa-models-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->swim_spa_model_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->swim_spa_model_id], [
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
            'swim_spa_model_id',
            'swim_spa_model_name',
        ],
    ]) ?>

</div>
