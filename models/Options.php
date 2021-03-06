<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property string $description
 * @property integer $status
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['email','adminEmail'], 'string'],
            [['phone'], 'string', 'max' => 12],
            [['url'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 60],
            [['logo', 'description'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'logo' => 'Логотип',
            'phone' => 'Телефон',
            'adminEmail'=>'AdminEmail',
            'email'=>'Email',
            'url' => 'Аддрес',
            'description' => 'Описание',
            'status' => 'Активность',
        ];
    }
}
