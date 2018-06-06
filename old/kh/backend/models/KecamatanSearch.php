<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kecamatan;

/**
 * KecamatanSearch represents the model behind the search form of `backend\models\Kecamatan`.
 */
class KecamatanSearch extends Kecamatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kode'], 'integer'],
            [['title', 'created_date', 'updated_date', 'kabupaten_id', 'provinsi_id', 'created_by', 'updated_by'], 'safe'],
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
        $query = Kecamatan::find()->joinWith('kabupaten')->joinWith('updatedBy');

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
            'kecamatan.id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'kecamatan.kode', $this->kode]);
        $query->andFilterWhere(['like', 'kecamatan.title', $this->title]);
        $query->andFilterWhere(['like', 'kabupaten.title', $this->kabupaten_id]);
        $query->andFilterWhere(['like', 'user.username', $this->created_by]);
        $query->andFilterWhere(['like', 'user.username', $this->updated_by]);

        return $dataProvider;
    }
}
