<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrailerLoad */

$this->title = 'Update Trailer Load: ' . ' ' . $model->trailer_load_id;
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trailer-load-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
