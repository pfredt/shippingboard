<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "swim_spas_to_trailer_loads".
   *
   * @property string $index_number
   * @property string $trailer_load_id
   * @property string $swim_spa_model_id
   * @property string $serial_number
   *
   * @property TrailerLoad $trailerLoad
   * @property SwimSpaModels $swimSpaModel
   */
  class SwimSpasToTrailerLoads extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'swim_spas_to_trailer_loads';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [ [ 'trailer_load_id', 'swim_spa_model_id' ], 'required' ],
        [ [ 'trailer_load_id', 'swim_spa_model_id' ], 'integer' ],
        [ 'serial_number', 'string' ],
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'index_number'      => 'Index Number',
        'trailer_load_id'   => 'Trailer Load ID',
        'swim_spa_model_id' => 'Swim Spa Model ID',
      ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrailerLoad() {
      return $this->hasOne( TrailerLoad::className(), [ 'trailer_load_id' => 'trailer_load_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSwimSpaModel() {
      return $this->hasOne( SwimSpaModels::className(), [ 'swim_spa_model_id' => 'swim_spa_model_id' ] );
    }
  }
