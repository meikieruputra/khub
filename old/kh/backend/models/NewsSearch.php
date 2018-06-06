<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\News;

/**
 * NewsSearch represents the model behind the search form of `backend\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', ], 'integer'],
            [['title', 'slug', 'lead_photo', 'lead_text', 'content', 'meta_description', 'created_at', 'updated_at', 'created_by', 'updated_by', 'category_id', 'status_id'], 'safe'],
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
        $query = News::find()->joinWith('updatedBy');

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'category_id' => $this->category_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'lead_photo', $this->lead_photo])
            ->andFilterWhere(['like', 'lead_text', $this->lead_text])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'user.username', $this->created_by])
            ->andFilterWhere(['like', 'user.username', $this->updated_by]);

        return $dataProvider;
    }
}
