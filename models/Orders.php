<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property string $date
 * @property integer $status
 *
 * @property OrderGroups $group
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'status'], 'integer'],
            [['name', 'email'],'required','message'=>''],
          
            [['email'], 'email'],
            [['text'], 'string'],
            [['date'], 'safe'],
            ['date','default', 'value' => date("Y-m-d")],
            [['name', 'email'], 'string', 'max' => 32],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'name' => 'Name',
            'email' => 'Email',
            'text' => 'Text',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(OrderGroups::className(), ['id' => 'group_id']);
    }
}
