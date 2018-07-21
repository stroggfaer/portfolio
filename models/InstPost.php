<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inst_post".
 *
 * @property int $id
 * @property int $image_id
 * @property string $description
 * @property string $date_begin
 * @property string $date_end
 * @property string $date
 * @property int $status
 */
class InstPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inst_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['date_begin', 'date_end', 'date'], 'safe'],
            [['date'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_id' => 'Image ID',
            'description' => 'Description',
            'date_begin' => 'Date Begin',
            'date_end' => 'Date End',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
}
