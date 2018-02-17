<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Page;

/**
 * PageSearch represents the model behind the search form about `app\models\admin\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'disc'], 'integer'],
            [['tite', 'key_page'], 'safe'],
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
        $query = Page::find();

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
            'disc' => $this->disc,
        ]);

        $query->andFilterWhere(['like', 'tite', $this->tite])
            ->andFilterWhere(['like', 'key_page', $this->key_page]);

        return $dataProvider;
    }
}
