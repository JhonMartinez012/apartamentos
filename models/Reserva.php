<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tab_reservas".
 *
 * @property int $idReserva
 * @property string $codReserva
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property float $valorAdicionalPagar
 * @property float $valorTotalPagar
 * @property int $idApartamento
 * @property int $idCliente
 * @property int $idEstadoReserva
 * @property int $idTasaAdicional
 *
 * @property TabApartamentos $idApartamento0
 * @property TabClientes $idCliente0
 * @property TabEstadosReserva $idEstadoReserva0
 * @property TabTasaAdicional $idTasaAdicional0
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_reservas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codReserva', 'fecha_inicio', 'fecha_fin',  'idApartamento', 'idCliente'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['idApartamento', 'idCliente'], 'integer'],
            [['codReserva'], 'string', 'max' => 200],
            [['codReserva'], 'unique'],
            [['idApartamento'], 'exist', 'skipOnError' => true, 'targetClass' => ApartamentoModel::class, 'targetAttribute' => ['idApartamento' => 'idApartamento']],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['idCliente' => 'idCliente']],
            // [['idEstadoReserva'], 'exist', 'skipOnError' => true, 'targetClass' => TabEstadosReserva::class, 'targetAttribute' => ['idEstadoReserva' => 'idEstadoReserva']],
            // [['idTasaAdicional'], 'exist', 'skipOnError' => true, 'targetClass' => TabTasaAdicional::class, 'targetAttribute' => ['idTasaAdicional' => 'idTasaAdicional']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idReserva' => 'Id Reserva',
            'codReserva' => 'Cod Reserva',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'valorAdicionalPagar' => 'Valor Adicional Pagar',
            'valorTotalPagar' => 'Valor Total Pagar',
            'idApartamento' => 'Apartamento',
            'idCliente' => 'Cliente',
            'idEstadoReserva' => 'Id Estado Reserva',
            'idTasaAdicional' => 'Tasa Adicional',
        ];
    }

    /**
     * Gets query for [[IdApartamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdApartamento0()
    {
        return $this->hasOne(ApartamentoModel::class, ['idApartamento' => 'idApartamento']);
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::class, ['idCliente' => 'idCliente']);
    }

    /**
     * Gets query for [[IdEstadoReserva0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoReserva0()
    {
        return $this->hasOne(TabEstadosReserva::class, ['idEstadoReserva' => 'idEstadoReserva']);
    }

    /**
     * Gets query for [[IdTasaAdicional0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTasaAdicional0()
    {
        return $this->hasOne(TabTasaAdicional::class, ['idTasaAdicional' => 'idTasaAdicional']);
    }
}
