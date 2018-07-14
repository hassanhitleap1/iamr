<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memberships;

/**
 * MembershipsSearch represents the model behind the search form of `app\models\Memberships`.
 */
class MembershipsSearch extends Memberships
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'features_en', 'features_ar', 'features_de'], 'integer'],
            [['name_en', 'name_ar', 'name_it', 'name_fr', 'name_de', 'features_fr', 'features_it', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Memberships::find();

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
            'features_en' => $this->features_en,
            'features_ar' => $this->features_ar,
            'features_de' => $this->features_de,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ar', $this->name_ar])
            ->andFilterWhere(['like', 'name_it', $this->name_it])
            ->andFilterWhere(['like', 'name_fr', $this->name_fr])
            ->andFilterWhere(['like', 'name_de', $this->name_de])
            ->andFilterWhere(['like', 'features_fr', $this->features_fr])
            ->andFilterWhere(['like', 'features_it', $this->features_it]);

        return $dataProvider;
    }
}
