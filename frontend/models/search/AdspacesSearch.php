<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Adspaces;

/**
 * AdspacesSearch represents the model behind the search form about `app\models\Adspaces`.
 */
class AdspacesSearch extends Adspaces
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ownedApp_id', 'width', 'hight', 'refreshTime'], 'integer'],
            [['type', 'clickType'], 'safe'],
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
        $query = Adspaces::find();

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
            'ownedApp_id' => $this->ownedApp_id,
            'width' => $this->width,
            'hight' => $this->hight,
            'refreshTime' => $this->refreshTime,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'clickType', $this->clickType]);

        return $dataProvider;
    }
}
