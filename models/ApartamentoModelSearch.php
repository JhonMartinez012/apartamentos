<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ApartamentoModel;

/**
 * ApartamentoModelSearch represents the model behind the search form of `app\models\ApartamentoModel`.
 */
class ApartamentoModelSearch extends ApartamentoModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idApartamento', 'idTarifa'], 'integer'],
            [['nombre', 'direccion', 'ciudad'], 'safe'],
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
        $query = ApartamentoModel::find();

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
            'idApartamento' => $this->idApartamento,
            'idTarifa' => $this->idTarifa,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad]);

        return $dataProvider;
    }
}
