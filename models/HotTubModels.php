<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "hot_tub_models".
   *
   * @property string $hot_tub_model_id
   * @property string $hot_tub_model_name
   *
   * @property HotTubsToTrailerLoads[] $hotTubsToTrailerLoads
   */
  class HotTubModels extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'hot_tub_models';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [['hot_tub_model_name'], 'required'],
        [['hot_tub_model_name'], 'string', 'max' => 500]
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'hot_tub_model_id'   => 'Hot Tub ID',
        'hot_tub_model_name' => 'Hot Tub Name',
      ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotTubsToTrailerLoads() {
      return $this->hasMany(HotTubsToTrailerLoads::className(), ['hot_tub_model_id' => 'hot_tub_model_id']);
    }
  }
