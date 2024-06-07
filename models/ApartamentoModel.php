<?php

namespace app\models;

use Yii;

use app\models\TiposApartamento;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "tab_apartamentos".
 *
 * @property int $idApartamento
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property int $idTarifa
 *
 * @property TabReservas $idApartamento0
 * @property TabTarifas $idTarifa0
 * @property TabReservas[] $tabReservas
 */
class ApartamentoModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_apartamentos';
    }

    /**
     * {@inheritdoc}
     */
    public $idTipoApartamento; // Atributo virtual para el select

    public function rules()
    {
        return [
            [['nombre', 'direccion', 'ciudad', 'idTarifa'], 'required'],
            [['idTarifa'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['direccion'], 'string', 'max' => 255],
            [['ciudad'], 'string', 'max' => 60],
            [['idTipoApartamento'],'integer'],
            // [['idTarifa'], 'exist', 'skipOnError' => true, 'targetClass' => TabTarifas::class, 'targetAttribute' => ['idTarifa' => 'idTarifa']],
            // [['idApartamento'], 'exist', 'skipOnError' => true, 'targetClass' => TabReservas::class, 'targetAttribute' => ['idApartamento' => 'idApartamento']],
        ];
    }

    public $tarifa;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idApartamento' => 'Id Apartamento',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'idTarifa' => 'Tarifa',
            'idTipoApartamento' => 'Tipo de apartamento '
        ];
    }

    /**
     * Gets query for [[IdApartamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdApartamento0()
    {
        return $this->hasOne(Reservas::class, ['idApartamento' => 'idApartamento']);
    }

    /**
     * Gets query for [[IdTarifa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTarifa0()
    {
        return $this->hasOne(Tarifas::class, ['idTarifa' => 'idTarifa']);
    }

    /**
     * Gets query for [[TabReservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabReservas()
    {
        return $this->hasMany(Reservas::class, ['idApartamento' => 'idApartamento']);
    }

}
