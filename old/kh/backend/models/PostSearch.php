<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Post;

/**
 * PostSearch represents the model behind the search form of `backend\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'post_category_id', 'tag', 'show', 'created_by', 'updated_by'], 'integer'],
            [['title', 'slug', 'description', 'future_image', 'content', 'created_date', 'updated_date'], 'safe'],
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
        $query = Post::find();

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
            'post_category_id' => $this->post_category_id,
            'tag' => $this->tag,
            'show' => $this->show,
            'created_date' => $this->created_date,
            'created_by' => $this->created_by,
            'updated_date' => $this->updated_date,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'future_image', $this->future_image])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
