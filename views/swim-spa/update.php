<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SwimSpaModels */

$this->title = 'Update Swim Spa Models: ' . ' ' . $model->swim_spa_model_id;
$this->params['breadcrumbs'][] = ['label' => 'Swim Spa Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->swim_spa_model_id, 'url' => ['view', 'id' => $model->swim_spa_model_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="swim-spa-models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
