<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tarifas;

/**
 * TarifaSearch represents the model behind the search form of `app\models\Tarifas`.
 */
class TarifaSearch extends Tarifas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTarifa', 'idTipoApartamento'], 'integer'],
            [['valorTarifa'], 'number'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
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
        $query = Tarifas::find();

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
            'idTarifa' => $this->idTarifa,
            'valorTarifa' => $this->valorTarifa,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'idTipoApartamento' => $this->idTipoApartamento,
        ]);

        return $dataProvider;
    }
}
