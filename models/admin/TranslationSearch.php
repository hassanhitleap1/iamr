<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Translation;

/**
 * TranslationSearch represents the model behind the search form about `app\models\Translation`.
 */
class TranslationSearch extends Translation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'completed'], 'integer'],
            [['payment_id','user_id','hash'], 'safe'],
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
        $query = Translation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('user');
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('user');
        // grid filtering conditions
        $query->andFilterWhere([
            'translation.id' => $this->id,
            'translation.completed' => $this->completed,
        ]);

        $query->andFilterWhere(['like', 'translation.payment_id', $this->payment_id])
            ->andFilterWhere(['like', 'translation.hash', $this->hash])
            ->andFilterWhere(['like', 'user.full_name', $this->user_id]);

        return $dataProvider;
    }
}
