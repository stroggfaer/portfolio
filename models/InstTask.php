<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inst_task".
 *
 * @property int $id
 * @property string $data_begin
 * @property string $data_end
 * @property string $login
 * @property int $limit_int
 * @property int $processed
 * @property int $missed
 * @property string $tag
 * @property string $source
 * @property string $date
 * @property int $status
 */
class InstTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inst_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_begin', 'data_end', 'date'], 'safe'],
            [['limit_int', 'processed', 'missed', 'status'], 'integer'],
            [['login'], 'string', 'max' => 32],
            [['tag', 'source'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_begin' => 'Data Begin',
            'data_end' => 'Data End',
            'login' => 'Login',
            'limit_int' => 'Limit Int',
            'processed' => 'Processed',
            'missed' => 'Missed',
            'tag' => 'Tag',
            'source' => 'Source',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
}
