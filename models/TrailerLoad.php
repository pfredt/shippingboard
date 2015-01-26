<?php

  namespace app\models;

  use Yii;

  /**
   * This is the model class for table "trailer_load".
   *
   * @property string $trailer_load_id
   * @property string $shipping_date
   * @property integer $completed
   * @property string $dealer
   * @property integer $number_of_spas
   * @property integer $number_of_swimspas
   * @property string $shipper
   * @property string $trailer_type
   * @property string $status
   *
   * @property HotTubsToTrailerLoads[] $hotTubsToTrailerLoads
   * @property SwimSpasToTrailerLoads[] $swimSpasToTrailerLoads
   */
  class TrailerLoad extends \yii\db\ActiveRecord {
    public $spas_model;
    public $swim_spas_model;

    /**
     * @inheritdoc
     */
    public static function tableName() {
      return 'trailer_load';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
      return [
        [['number_of_spas', 'number_of_swimspas'], 'integer', 'min' => 0],
        [['number_of_spas'], 'integer', 'max' => 20],
        [['number_of_swimspas'], 'integer', 'max' => 10],
        [['completed', 'processed'], 'boolean'],
        [['shipping_date'], 'required'],
        [['dealer', 'shipping_date'], 'string', 'max' => 255],
        [['status', 'shipper', 'trailer_type'], 'string', 'max' => 55],
        [['dealer', 'number_of_spas', 'number_of_swimspas', 'shipper', 'trailer_type', 'status', 'shipping_date', 'spas_model', 'swim_spas_model'], 'safe'],
      ];
    }

    public function beforeDelete() {
      $ht = HotTubsToTrailerLoads::find()->where(['trailer_load_id' => $this->trailer_load_id])->all();
      if ($ht) foreach ($ht as $oht) $oht->delete();

      $ss = SwimSpasToTrailerLoads::find()->where(['trailer_load_id' => $this->trailer_load_id])->all();
      if ($ss) foreach ($ss as $oss) $oss->delete();

      return TRUE;
    }

    public function beforeSave() {
      $ar = explode("/", $this->shipping_date);
      $this->shipping_date = mktime(0, 0, 0, $ar[0], $ar[1], $ar[2]);


      return TRUE;
    }

    public function afterSave() {
      if (!$this->isNewRecord) {
        $ht = HotTubsToTrailerLoads::find()->where(['trailer_load_id' => $this->trailer_load_id])->all();
        if ($ht) foreach ($ht as $oht) $oht->delete();

        $ss = SwimSpasToTrailerLoads::find()->where(['trailer_load_id' => $this->trailer_load_id])->all();
        if ($ss) foreach ($ss as $oss) $oss->delete();
      }

      if ($this->spas_model)
        foreach ($this->spas_model as $spas_id) {
          $model = new HotTubsToTrailerLoads();
          $model->hot_tub_model_id = $spas_id;
          $model->trailer_load_id = $this->trailer_load_id;
          $model->save(FALSE);
        }

      if ($this->swim_spas_model)
        foreach ($this->swim_spas_model as $swim_spas_id) {
          $model = new SwimSpasToTrailerLoads();
          $model->swim_spa_model_id = $swim_spas_id;
          $model->trailer_load_id = $this->trailer_load_id;
          $model->save(FALSE);
        }

      return TRUE;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
      return [
        'trailer_load_id'    => 'Trailer Load ID',
        'completed'          => 'Completed',
        'processed'          => 'Processed',
        'dealer'             => 'Dealer',
        'number_of_spas'     => 'Number Of Spas',
        'number_of_swimspas' => 'Number Of Swimspas',
        'shipper'            => 'Shipper',
        'trailer_type'       => 'Trailer Type',
        'status'             => 'Status',
        'spas_model'         => 'Spas',
        'swim_spas_model'    => 'Swim Spas',
      ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotTubsToTrailerLoads() {
      return $this->hasMany(HotTubsToTrailerLoads::className(), ['trailer_load_id' => 'trailer_load_id'])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSwimSpasToTrailerLoads() {
      return $this->hasMany(SwimSpasToTrailerLoads::className(), ['trailer_load_id' => 'trailer_load_id'])->all();
    }
  }
