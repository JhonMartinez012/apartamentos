<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tab_clientes".
 *
 * @property int $idCliente
 * @property string $docCliente
 * @property string $nombre
 * @property string $apellido
 * @property string $email el email debe ser unico
 *
 * @property TabReservas[] $tabReservas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tab_clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['docCliente', 'nombre', 'apellido', 'email'], 'required'],
            [['docCliente'], 'string', 'max' => 20],
            [['nombre', 'apellido', 'email'], 'string', 'max' => 200],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'docCliente' => '# de Documento',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[TabReservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabReservas()
    {
        return $this->hasMany(TabReservas::class, ['idCliente' => 'idCliente']);
    }
}
