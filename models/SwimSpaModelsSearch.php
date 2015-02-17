<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SwimSpaModels;

/**
 * SwimSpaModelsSearch represents the model behind the search form about `app\models\SwimSpaModels`.
 */
class SwimSpaModelsSearch extends SwimSpaModels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['swim_spa_model_id'], 'integer'],
            [['swim_spa_model_name'], 'safe'],
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
        $query = SwimSpaModels::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'swim_spa_model_id' => $this->swim_spa_model_id,
        ]);

        $query->andFilterWhere(['like', 'swim_spa_model_name', $this->swim_spa_model_name]);

        return $dataProvider;
    }
}
