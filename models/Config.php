<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "config".
   *
   * @property integer $id
   * @property string $key
   * @property string $value
   * @property string $type
   */
  class Config extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [['key', 'value', 'type'], 'string']
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'id'    => 'ID',
        'key'   => 'Key',
        'value' => 'Value',
        'type'  => 'Type',
      ];
    }
  }
