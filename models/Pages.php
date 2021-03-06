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
            [['title','text'], 'required'],
            [['description', 'text'], 'string'],
            [['status'], 'integer'],
            [['title', 'seo_title'], 'string', 'max' => 128],
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
            'title' => 'Заголовок',
            'title_seo' => 'Сео загаловок',
            'keywords' => 'Ключ',
            'description' => 'Описание',
            'text' => 'Текст',
            'status' => 'Статус',
        ];
    }
}
