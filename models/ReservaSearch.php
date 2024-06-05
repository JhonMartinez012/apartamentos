<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form of `app\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idReserva', 'idApartamento', 'idCliente', 'idEstadoReserva', 'idTasaAdicional'], 'integer'],
            [['codReserva', 'fecha_inicio', 'fecha_fin', 'created_at'], 'safe'],
            [['valorAdicionalPagar', 'valorTotalPagar'], 'number'],
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
        $query = Reserva::find();

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
            'idReserva' => $this->idReserva,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'valorAdicionalPagar' => $this->valorAdicionalPagar,
            'valorTotalPagar' => $this->valorTotalPagar,
            'idApartamento' => $this->idApartamento,
            'idCliente' => $this->idCliente,
            'idEstadoReserva' => $this->idEstadoReserva,
            'idTasaAdicional' => $this->idTasaAdicional,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'codReserva', $this->codReserva]);

        return $dataProvider;
    }
}
