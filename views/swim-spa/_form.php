<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SwimSpaModels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="swim-spa-models-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'swim_spa_model_name')->textInput(['maxlength' => 500]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
