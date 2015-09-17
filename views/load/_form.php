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

  <?php $form = ActiveForm::begin( [
    'options'     => [ 'class' => 'form-horizontal' ],
    'fieldConfig' => [
      'template'     => "{label}\n<div class=\"col-lg-8\">{input}</div><br><br><div class=\"col-lg-12 text-right\">{error}</div>",
      'labelOptions' => [ 'class' => 'col-lg-4 control-label' ],
    ],
  ] ); ?>

  <?php
    $spas_models = app\models\HotTubModels::find()->orderBy( 'hot_tub_model_name asc' )->all();
    $items_for_spas = yii\helpers\ArrayHelper::map( $spas_models, 'hot_tub_model_id', 'hot_tub_model_name' );

    $swim_spas_models = app\models\SwimSpaModels::find()->orderBy( 'swim_spa_model_name asc' )->all();
    $items_for_swim_spas = yii\helpers\ArrayHelper::map( $swim_spas_models, 'swim_spa_model_id', 'swim_spa_model_name' );

    $ser_spas = [ ];
    $ser_swim = [ ];

    if ( !$model->isNewRecord ) {
      $names_spas = $model->getHotTubsToTrailerLoads();
      if ( $names_spas ) foreach ( $names_spas as $name_spas ) {
        $model->spas_model[$name_spas->hot_tub_model_id]++;
        $ser_spas[$name_spas->hot_tub_model_id] = $name_spas->serial_number;
      }

      $names_swim_spas = $model->getSwimSpasToTrailerLoads();
      if ( $names_swim_spas ) foreach ( $names_swim_spas as $name_swim_spas ) {
        $model->swim_spas_model[$name_swim_spas->swim_spa_model_id]++;
        $ser_swim[$name_swim_spas->swim_spa_model_id] = $name_swim_spas->serial_number;
      }
    }

  ?>

  <div class="row">
    <div class="col-lg-6">
      <?= $form->field( $model, 'shipping_date' )->textInput( [ 'maxlength' => 255, 'class' => 'datapicker form-control', 'value' => $model->shipping_date ? date( "m/d/Y", $model->shipping_date ) : "" ] ) ?>

      <div class="form-group field-trailerload-completed">
        <label class="col-lg-4 control-label" for="trailerload-completed">Complete</label>

        <div class="col-lg-8">
          <div class="checkbox">
            <?= $form->field( $model, 'completed' )->checkbox( [ 'label' => "" ] ) ?>
          </div>
        </div>
      </div>

      <div class="form-group field-trailerload-processed">
        <label class="col-lg-4 control-label" for="trailerload-processed">Processed</label>

        <div class="col-lg-8">
          <div class="checkbox">
            <?= $form->field( $model, 'processed' )->checkbox( [ 'label' => "" ] ) ?>
          </div>
        </div>
      </div>

      <div class="form-group field-trailerload-processed">
        <label class="col-lg-4 control-label">Spas</label>

        <div class="col-lg-8">
          <div id="info-box_spas_model">
            <?php if ( $spas_models ) foreach ( $spas_models as $spa ) { ?>
              <div class="form-item item">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" href="#collapse_spas_<?= $spa->hot_tub_model_id ?>" aria-expanded="true"
                         aria-controls="collapseOne">
                        Spas: <?= $spa->hot_tub_model_name . ( $model->spas_model[$spa->hot_tub_model_id] ? " <strong>(" . $model->spas_model[$spa->hot_tub_model_id] . ")</strong>" : "" ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_spas_<?= $spa->hot_tub_model_id ?>" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                      <div class="raw" style="overflow: hidden;">
                        <div class="col-xs-4">
                          <label class="control-label">Count</label>
                        </div>
                        <div class="col-xs-4 col-xs-offset-4">
                          <?= Html::textInput( 'TrailerLoad[spas_model][' . $spa->hot_tub_model_id . '][count]', $model->spas_model[$spa->hot_tub_model_id], [ 'class' => 'form-control input-sm' ] ); ?>
                        </div>
                        <div class="col-xs-12">
                          <hr>
                        </div>
                        <?= Html::textarea( 'TrailerLoad[spas_model][' . $spa->hot_tub_model_id . '][serial_number]', $ser_spas[$spa->hot_tub_model_id], [ 'class' => 'form-control input-sm' ], '' ) ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>

      <div class="form-group field-trailerload-processed">
        <label class="col-lg-4 control-label">Swim Spas</label>

        <div class="col-lg-8">
          <div id="info-box_spas_model">
            <?php if ( $swim_spas_models ) foreach ( $swim_spas_models as $spa ) { ?>
              <div class="form-item item">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" href="#collapse_spas_<?= $spa->swim_spa_model_id ?>" aria-expanded="true"
                         aria-controls="collapseOne">
                        Swim
                        Spas: <?= $spa->swim_spa_model_name . ( $model->swim_spas_model[$spa->swim_spa_model_id] ? " <strong>(" . $model->swim_spas_model[$spa->swim_spa_model_id] . ")</strong>" : "" ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_spas_<?= $spa->swim_spa_model_id ?>" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                      <div class="raw" style="overflow: hidden;">
                        <div class="col-xs-4">
                          <label class="control-label">Count</label>
                        </div>
                        <div class="col-xs-4 col-xs-offset-4">
                          <?= Html::textInput( 'TrailerLoad[swim_spas_model][' . $spa->swim_spa_model_id . '][count]', $model->swim_spas_model[$spa->swim_spa_model_id], [ 'class' => 'form-control input-sm' ] ); ?>
                        </div>
                        <div class="col-xs-12">
                          <hr>
                        </div>
                        <?= Html::textarea( 'TrailerLoad[swim_spas_model][' . $spa->swim_spa_model_id . '][serial_number]', $ser_swim[$spa->swim_spa_model_id], [ 'class' => 'form-control input-sm' ], '' ) ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>


      <?php $form->field( $model, 'spas_model' )->widget( MultiSelect::className(), [ 'data' => $items_for_spas ] ) ?>

      <?php $form->field( $model, 'swim_spas_model' )->widget( MultiSelect::className(), [ 'data' => $items_for_swim_spas ] ) ?>
    </div>
    <div class="col-lg-6">
      <?= $form->field( $model, 'dealer' )->textInput( [ 'maxlength' => 255 ] ) ?>

      <?= $form->field( $model, 'number_of_spas' )->textInput( [ 'class' => 'number form-control', 'min' => 0 ] ) ?>

      <?= $form->field( $model, 'number_of_swimspas' )->textInput( [ 'class' => 'number form-control', 'min' => 0 ] ) ?>

      <?= $form->field( $model, 'shipper' )->textInput( [ 'maxlength' => 55 ] ) ?>

      <?= $form->field( $model, 'trailer_type' )->textInput( [ 'maxlength' => 55 ] ) ?>

      <?= $form->field( $model, 'status' )->dropDownList( Yii::$app->params['status'] ); ?>

      <?= $form->field( $model, 'thinkness' )->textInput( [ 'class' => 'number form-control', 'min' => 1 ] ) ?>

      <?= $form->field( $model, 'weight' )->dropDownList( Yii::$app->params['weight'] ) ?>


    </div>
  </div>


  <div class="form-group">
    <?= Html::submitButton( $model->isNewRecord ? 'Create' : 'Update', [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ] ) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
