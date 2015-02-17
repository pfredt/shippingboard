<?php

  use yii\helpers\Html,
    yii\bootstrap\ActiveForm;

  /** @var $items app\models\Config */
  /** @var $item app\models\Config */

  $this->title = 'Customizations';
  $this->params['breadcrumbs'][] = $this->title;
?>

<div class="trailer-load-create">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>

  <?php if ($items) foreach ($items as $item) { ?>
    <?php $form = ActiveForm::begin([
      'id'          => uniqid() . '-form',
      'options'     => ['class' => 'form-horizontal'],
      'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-lg-9\">{input}</div><br><br><div class=\"col-lg-9 col-lg-offset-3\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-3 control-label'],
      ],
    ]); ?>
    <input type="hidden" name="Config[id]" value="<?= $item->id ?>">
    <div class="row">
      <div class="col-lg-8">
        <?php
          switch ($item->type) {
            case 'color':
              echo $form->field($item, 'value')->textInput(['class' => 'colorpicker form-control'])->label($item->description);
              break;

            case 'weight':
              echo $form->field($item, 'value')->dropDownList(Yii::$app->params['weight'])->label($item->description);
              break;

            case 'size':
              echo $form->field($item, 'value')->textInput(['class' => 'number form-control', 'min' => 1]);
              break;
          }
        ?>
      </div>
      <div class="col-lg-4">
        <?= Html::submitButton('Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  <?php } ?>
</div>