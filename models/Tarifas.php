<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tab_tarifas".
 *
 * @property int $idTarifa
 * @property float $valorTarifa
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property int $idTipoApartamento
 *
 * @property TabTiposApartamento $idTipoApartamento0
 * @property TabApartamentos[] $tabApartamentos
 */
class Tarifas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_tarifas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valorTarifa', 'fecha_inicio', 'fecha_fin', 'idTipoApartamento'], 'required'],
            [['valorTarifa'], 'number'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['idTipoApartamento'], 'integer'],
            [['idTipoApartamento'], 'exist', 'skipOnError' => true, 'targetClass' => TiposApartamento::class, 'targetAttribute' => ['idTipoApartamento' => 'idTipoApartamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTarifa' => 'Id Tarifa',
            'valorTarifa' => 'Valor Tarifa',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'idTipoApartamento' => 'Tipo apartamento',
        ];
    }

    /**
     * Gets query for [[IdTipoApartamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoApartamento0()
    {
        return $this->hasOne(TiposApartamento::class, ['idTipoApartamento' => 'idTipoApartamento']);
    }

    /**
     * Gets query for [[TabApartamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabApartamentos()
    {
        return $this->hasMany(ApartamentoModel::class, ['idTarifa' => 'idTarifa']);
    }
}
