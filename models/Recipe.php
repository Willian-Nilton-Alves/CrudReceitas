<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property string $name
 */
class Recipe extends \yii\db\ActiveRecord
{

    public function getRecipeIngredients()
{
    return $this->hasMany(RecipeIngredient::class, ['recipe_id' => 'id']);
}
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }
}
