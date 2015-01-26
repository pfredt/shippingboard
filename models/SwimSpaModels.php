<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "swim_spa_models".
   *
   * @property string $swim_spa_model_id
   * @property string $swim_spa_model_name
   *
   * @property SwimSpasToTrailerLoads[] $swimSpasToTrailerLoads
   */
  class SwimSpaModels extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'swim_spa_models';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [['swim_spa_model_name'], 'required'],
        [['swim_spa_model_name'], 'string', 'max' => 500]
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'swim_spa_model_id'   => 'Swim Spa Model ID',
        'swim_spa_model_name' => 'Swim Spa Model Name',
      ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSwimSpasToTrailerLoads() {
      return $this->hasMany(SwimSpasToTrailerLoads::className(), ['swim_spa_model_id' => 'swim_spa_model_id']);
    }
  }
