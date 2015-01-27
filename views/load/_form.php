<?php

  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use app\widgets\MultiSelect;

  /* @var $this yii\web\View */
  /* @var $model app\models\TrailerLoad */
  /* @var $form yii\widgets\ActiveForm */
?>
<br><br><br>
<div class="trailer-load-form">

  <?php $form = ActiveForm::begin([
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
      'template'     => "{label}\n<div class=\"col-lg-8\">{input}</div><br><br><div class=\"col-lg-12 text-right\">{error}</div>",
      'labelOptions' => ['class' => 'col-lg-4 control-label'],
    ],
  ]); ?>

  <?php
    $spas_models = app\models\HotTubModels::find()->orderBy('hot_tub_model_name asc')->all();
    $items_for_spas = yii\helpers\ArrayHelper::map($spas_models, 'hot_tub_model_id', 'hot_tub_model_name');

    $swim_spas_models = app\models\SwimSpaModels::find()->orderBy('swim_spa_model_name asc')->all();
    $items_for_swim_spas = yii\helpers\ArrayHelper::map($swim_spas_models, 'swim_spa_model_id', 'swim_spa_model_name');

    if (!$model->isNewRecord) {
      $names_spas = $model->getHotTubsToTrailerLoads();
      if ($names_spas) foreach ($names_spas as $name_spas) {
        $model->spas_model[] = $name_spas->hot_tub_model_id;
      }

      $names_swim_spas = $model->getSwimSpasToTrailerLoads();
      if ($names_swim_spas) foreach ($names_swim_spas as $name_swim_spas) {
        $model->swim_spas_model[] = $name_swim_spas->swim_spa_model_id;
      }
    }

  ?>

  <div class="row">
    <div class="col-lg-6">
      <?= $form->field($model, 'shipping_date')->textInput(['maxlength' => 255, 'class' => 'datapicker form-control', 'value' => $model->shipping_date ? date("m/d/Y", $model->shipping_date) : ""]) ?>

      <div class="form-group field-trailerload-completed">
        <label class="col-lg-4 control-label" for="trailerload-completed">Complete</label>

        <div class="col-lg-8">
          <div class="checkbox">
            <?= $form->field($model, 'completed')->checkbox(['label' => ""]) ?>
          </div>
        </div>
      </div>

      <div class="form-group field-trailerload-processed">
        <label class="col-lg-4 control-label" for="trailerload-processed">Processed</label>

        <div class="col-lg-8">
          <div class="checkbox">
            <?= $form->field($model, 'processed')->checkbox(['label' => ""]) ?>
          </div>
        </div>
      </div>

      <?= $form->field($model, 'spas_model')->widget(MultiSelect::className(), ['data' => $items_for_spas]) ?>

      <?= $form->field($model, 'swim_spas_model')->widget(MultiSelect::className(), ['data' => $items_for_swim_spas]) ?>
    </div>
    <div class="col-lg-6">
      <?= $form->field($model, 'dealer')->textInput(['maxlength' => 255]) ?>

      <?= $form->field($model, 'number_of_spas')->textInput(['class' => 'number form-control', 'min' => 0, 'max' => 20]) ?>

      <?= $form->field($model, 'number_of_swimspas')->textInput(['class' => 'number form-control', 'min' => 0, 'max' => 10]) ?>

      <?= $form->field($model, 'shipper')->textInput(['maxlength' => 55]) ?>

      <?= $form->field($model, 'trailer_type')->textInput(['maxlength' => 55]) ?>

      <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['status']); ?>
    </div>
  </div>


  <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
