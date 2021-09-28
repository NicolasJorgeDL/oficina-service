<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cliente".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string|null $email
 *
 * @property Endereco[] $enderecos
 * @property Pedido[] $pedidos
 * @property TelefoneCliente[] $telefoneClientes
 */
class PessoaFisica2 extends \yii\db\ActiveRecord
{
    public $cpf;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['cpf', 'filter', 'filter' => function($value) {
                return preg_replace('/[^0-9]/', '', $value);
            }],
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['cpf'], 'string', 'max' => 15],
            [['documento'], 'string'],
            [['email'], 'string', 'max' => 45],
        ];
    }


    /**
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['Cliente_id' => 'id']);
    }

    // /**
    //  * Gets query for [[Pedidos]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getPedidos()
    // {
    //     return $this->hasMany(Pedido::className(), ['Cliente_id1' => 'id']);
    // }

    // /**
    //  * Gets query for [[TelefoneClientes]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getTelefoneClientes()
    // {
    //     return $this->hasMany(TelefoneCliente::className(), ['Cliente_id' => 'id']);
    // }
}
