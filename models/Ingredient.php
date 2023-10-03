<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ingredient".
 *
 * @property int $id
 * @property string $name
 * @property integer $quantity
 */
class ingredient extends \yii\db\ActiveRecord
{
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
}
