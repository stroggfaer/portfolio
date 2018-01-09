<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inst_proxy".
 *
 * @property int $id
 * @property string $title
 * @property string $ip
 * @property int $status
 */
class InstProxy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inst_proxy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 32],
            [['ip'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'ip' => 'Ip',
            'status' => 'Status',
        ];
    }
}
