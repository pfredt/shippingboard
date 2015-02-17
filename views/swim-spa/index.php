<?php

  use yii\helpers\Html;
  use yii\grid\GridView;

  /* @var $this yii\web\View */
  /* @var $searchModel app\models\SwimSpaModelsSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */

  $this->title = 'Swim Spa Models';
  $this->params['breadcrumbs'][] = $this->title;
?>
<div class="swim-spa-models-index">

  <h1>
    <?= Html::encode($this->title) ?>
    <?= Html::a('Create Swim Spa Models', ['create'], ['class' => 'btn btn-success pull-right']) ?>
  </h1>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
      //['class' => 'yii\grid\SerialColumn'],

      'swim_spa_model_id',
      'swim_spa_model_name',

      ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
    ],
  ]); ?>

</div>
