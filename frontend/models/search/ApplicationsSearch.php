<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Applications;

/**
 * ApplicationsSearch represents the model behind the search form about `app\models\Applications`.
 */
class ApplicationsSearch extends Applications
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'owner_id'], 'integer'],
            [['app_key', 'appName', 'platform', 'store_url', 'status', 'approved'], 'safe'],
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
        $query = Applications::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'owner_id' => $this->owner_id,
        ]);

        $query->andFilterWhere(['like', 'app_key', $this->app_key])
            ->andFilterWhere(['like', 'appName', $this->appName])
            ->andFilterWhere(['like', 'platform', $this->platform])
            ->andFilterWhere(['like', 'store_url', $this->store_url])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'approved', $this->approved]);

        return $dataProvider;
    }
}
