<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kabupaten;

/**
 * KabupatenSearch represents the model behind the search form of `backend\models\Kabupaten`.
 */
class KabupatenSearch extends Kabupaten
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kode'], 'integer'],
            [['title', 'created_date', 'updated_date', 'provinsi_id', 'created_by', 'updated_by'], 'safe'],
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
        $query = Kabupaten::find()->joinWith('provinsi')->joinWith('updatedBy');

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

        $query->andFilterWhere([
            'kabupaten.id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'kabupaten.kode', $this->kode]);
        $query->andFilterWhere(['like', 'kabupaten.title', $this->title]);
        $query->andFilterWhere(['like', 'provinsi.title', $this->provinsi_id]);
        $query->andFilterWhere(['like', 'user.username', $this->created_by]);
        $query->andFilterWhere(['like', 'user.username', $this->updated_by]);

        return $dataProvider;
    }
}
