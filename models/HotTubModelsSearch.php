<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HotTubModels;

/**
 * HotTubModelsSearch represents the model behind the search form about `app\models\HotTubModels`.
 */
class HotTubModelsSearch extends HotTubModels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hot_tub_model_id'], 'integer'],
            [['hot_tub_model_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = HotTubModels::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'hot_tub_model_id' => $this->hot_tub_model_id,
        ]);

        $query->andFilterWhere(['like', 'hot_tub_model_name', $this->hot_tub_model_name]);

        return $dataProvider;
    }
}
