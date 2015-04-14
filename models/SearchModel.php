<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchModel extends Model {
  public $from;
  public $to;

  /**
   * @return array the validation rules.
   */
  public function rules() {
    return [
      [['from', 'to'], 'safe'],
    ];
  }

  public function doo() {
    $ar = explode("/", $this->from);
    $this->from = mktime(0, 0, 0, $ar[0], $ar[1], $ar[2]);

    $ar = explode("/", $this->to);
    $this->to = mktime(0, 0, 0, $ar[0], $ar[1], $ar[2]);

    return true;
  }
}
