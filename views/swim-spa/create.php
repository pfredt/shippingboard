<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SwimSpaModels */

$this->title = 'Create Swim Spa Models';
$this->params['breadcrumbs'][] = ['label' => 'Swim Spa Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="swim-spa-models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
