<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 */
class Ingredient extends \yii\db\ActiveRecord
{
    public $availability;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'quantity'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['quantity'], 'integer'], // Certifique-se de que a propriedade quantity está presente e é do tipo inteiro.
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'quantity' => Yii::t('app', 'Quantity'),
        ];
    }

    public function isAvailable($quantity)
    {
        // Implemente a lógica para verificar a disponibilidade do ingrediente.
        // Por exemplo, pode ser baseado em algum atributo no banco de dados.
        return $this->availability >= $quantity; // Assumindo que 'availability' é um atributo que indica disponibilidade.
    }
}
