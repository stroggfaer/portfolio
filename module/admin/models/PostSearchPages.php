<?php

namespace app\module\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pages;

/**
 * PostSearchPages represents the model behind the search form about `app\models\Pages`.
 */
class PostSearchPages extends Pages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['url', 'title', 'seo_title', 'keywords', 'description', 'text'], 'safe'],
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
        $query = Pages::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'seo_title', $this->title_seo])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
