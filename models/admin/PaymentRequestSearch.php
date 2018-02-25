<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentRequest;

/**
 * PaymentRequestSearch represents the model behind the search form about `app\models\PaymentRequest`.
 */
class PaymentRequestSearch extends PaymentRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'accept'], 'integer'],
            [['value'], 'number'],
            [['paypal', 'western_union_full_name', 'country', 'full_address', 'create_at'], 'safe'],
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
        $query = PaymentRequest::find();

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
            'value' => $this->value,
            'user_id' => $this->user_id,
            'create_at' => $this->create_at,
            'accept' => $this->accept,
        ]);

        $query->andFilterWhere(['like', 'paypal', $this->paypal])
            ->andFilterWhere(['like', 'western_union_full_name', $this->western_union_full_name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'full_address', $this->full_address]);

        return $dataProvider;
    }
}
