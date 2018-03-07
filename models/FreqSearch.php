<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Freq;

/**
 * FreqSearch represents the model behind the search form about `app\models\Freq`.
 */
class FreqSearch extends Freq
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_html', 'prg_en', 'prg_de', 'prg_it', 'prg_ar', 'prg_fr', 'collapse_en', 'collapse_it', 'collapse_de', 'collapse_fr', 'collapse_ar'], 'safe'],
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
        $query = Freq::find();

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
        ]);

        $query->andFilterWhere(['like', 'id_html', $this->id_html])
            ->andFilterWhere(['like', 'prg_en', $this->prg_en])
            ->andFilterWhere(['like', 'prg_de', $this->prg_de])
            ->andFilterWhere(['like', 'prg_it', $this->prg_it])
            ->andFilterWhere(['like', 'prg_ar', $this->prg_ar])
            ->andFilterWhere(['like', 'prg_fr', $this->prg_fr])
            ->andFilterWhere(['like', 'collapse_en', $this->collapse_en])
            ->andFilterWhere(['like', 'collapse_it', $this->collapse_it])
            ->andFilterWhere(['like', 'collapse_de', $this->collapse_de])
            ->andFilterWhere(['like', 'collapse_fr', $this->collapse_fr])
            ->andFilterWhere(['like', 'collapse_ar', $this->collapse_ar]);

        return $dataProvider;
    }
}
