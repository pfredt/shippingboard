<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HotTubModels */

$this->title = 'Create Hot Tub Models';
$this->params['breadcrumbs'][] = ['label' => 'Hot Tub Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hot-tub-models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
