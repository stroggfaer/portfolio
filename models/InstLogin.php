<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inst_login".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $status
 */
class InstLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inst_login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login'], 'required'],
            [['status'], 'integer'],
            [['login'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }
}
