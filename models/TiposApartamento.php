<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tab_tipos_apartamento".
 *
 * @property int $idTipoApartamento
 * @property string $tipoApartamento Se describe tipo de apartamento(corporativo, turistico)
 * @property int $tipoAlquiler 0: dias, 1: mensual
 *
 * @property TabTarifas[] $tabTarifas
 */
class TiposApartamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_tipos_apartamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoApartamento', 'tipoAlquiler'], 'required'],
            [['tipoAlquiler'], 'integer'],
            [['tipoApartamento'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipoApartamento' => 'Id Tipo Apartamento',
            'tipoApartamento' => 'Tipo Apartamento',
            'tipoAlquiler' => 'Tipo Alquiler',
        ];
    }

    /**
     * Gets query for [[TabTarifas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabTarifas()
    {
        return $this->hasMany(TabTarifas::class, ['idTipoApartamento' => 'idTipoApartamento']);
    }
}
