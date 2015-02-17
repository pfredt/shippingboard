<?php

  use yii\helpers\Html;
  use yii\grid\GridView;

  /* @var $this yii\web\View */
  /* @var $searchModel app\models\HotTubModelsSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */

  $this->title = 'Hot Tub Models';
  $this->params['breadcrumbs'][] = $this->title;
?>
<div class="hot-tub-models-index">

  <h1>
    <?= Html::encode($this->title) ?>
    <?= Html::a('Create Hot Tub Model', ['create'], ['class' => 'btn btn-success pull-right']) ?>
  </h1>


  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
      //['class' => 'yii\grid\SerialColumn'],

      'hot_tub_model_id',
      'hot_tub_model_name',

      ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
    ],
  ]); ?>

</div>
