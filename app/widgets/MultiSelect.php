<<<<<<< HEAD
<?php
  namespace app\widgets;

  use Yii;
  use yii\widgets\InputWidget;

  class MultiSelect extends InputWidget {
    public $data;

    public function run() {
      $attr = $this->attribute;
      $list = $this->model->$attr;

      $data = [];

      if ($list)
        foreach ($list as $l)
          $data[$l]++;

      $list = $data;


      echo "\r\n\r\n<!-- WIDGET BEGIN -->\r\n\r\n";
      echo "<div class=\"well well-sm\">";

      echo \yii\helpers\Html::dropDownList($attr, NULL, $this->data, ['class' => 'form-control', 'id' => 'select_' . $attr]);

      /*if ($list) {
        foreach ($list as $key => $row) {
          echo $this->render('viewItem', ['attribute' => $this->attribute, 'ind' => $key, 'item' => $row]);
        }
      }*/

      echo $this->render('view', ['attribute' => $attr, 'model' => $this->model, 'list' => $list, 'data' => $this->data]);

      echo "\r\n</div>\r\n";
      echo "<!-- WIDGET END -->\r\n\r\n";
    }
  }
=======
<?php
  namespace app\widgets;

  use Yii;
  use yii\widgets\InputWidget;

  class MultiSelect extends InputWidget {
    public $data;

    public function run() {
      $attr = $this->attribute;
      $list = $this->model->$attr;

      $data = [];

      if ($list)
        foreach ($list as $l)
          $data[$l]++;

      $list = $data;


      echo "\r\n\r\n<!-- WIDGET BEGIN -->\r\n\r\n";
      echo "<div class=\"well well-sm\">";

      echo \yii\helpers\Html::dropDownList($attr, NULL, $this->data, ['class' => 'form-control', 'id' => 'select_' . $attr]);

      /*if ($list) {
        foreach ($list as $key => $row) {
          echo $this->render('viewItem', ['attribute' => $this->attribute, 'ind' => $key, 'item' => $row]);
        }
      }*/

      echo $this->render('view', ['attribute' => $attr, 'model' => $this->model, 'list' => $list, 'data' => $this->data]);

      echo "\r\n</div>\r\n";
      echo "<!-- WIDGET END -->\r\n\r\n";
    }
  }
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
