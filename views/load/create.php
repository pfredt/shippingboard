<?php

  use yii\helpers\Html;

  /* @var $this yii\web\View */
  /* @var $model app\models\TrailerLoad */

  $this->title = 'Create Trailer Load';
  $this->params['breadcrumbs'][] = $this->title;
?>
<div class="trailer-load-create">

  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
