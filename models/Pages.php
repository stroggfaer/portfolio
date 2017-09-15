<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_seo
 * @property string $keywords
 * @property string $description
 * @property string $text
 * @property integer $status
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_seo', 'keywords', 'description', 'text'], 'required'],
            [['description', 'text'], 'string'],
            [['status'], 'integer'],
            [['title', 'title_seo'], 'string', 'max' => 128],
            [['keywords'], 'string', 'max' => 228],
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
            'title_seo' => 'Title Seo',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'text' => 'Text',
            'status' => 'Status',
        ];
    }
}
