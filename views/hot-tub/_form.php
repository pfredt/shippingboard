<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HotTubModels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hot-tub-models-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hot_tub_model_name')->textInput(['maxlength' => 500]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
