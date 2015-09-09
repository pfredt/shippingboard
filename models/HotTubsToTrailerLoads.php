<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "hot_tubs_to_trailer_loads".
   *
   * @property string $index_number
   * @property string $trailer_load_id
   * @property string $hot_tub_model_id
   *
   * @property HotTubModels $hotTubModel
   * @property TrailerLoad $trailerLoad
   */
  class HotTubsToTrailerLoads extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'hot_tubs_to_trailer_loads';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [['trailer_load_id', 'hot_tub_model_id'], 'required'],
        [ [ 'trailer_load_id', 'hot_tub_model_id' ], 'integer' ],
        [ 'serial_number', 'string' ],
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'index_number'     => 'Index Number',
        'trailer_load_id'  => 'Trailer Load ID',
        'hot_tub_model_id' => 'Hot Tub Model ID',
      ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotTubModel() {
      return $this->hasOne(HotTubModels::className(), ['hot_tub_model_id' => 'hot_tub_model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrailerLoad() {
      return $this->hasOne(TrailerLoad::className(), ['trailer_load_id' => 'trailer_load_id']);
    }
  }
