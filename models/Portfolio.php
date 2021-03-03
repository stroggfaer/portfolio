<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property integer $status
 *
 * @property Images $image
 */
class Portfolio extends \yii\db\ActiveRecord
{
    public  $checkboxList;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'status','position'], 'integer'],
            [['title', 'description'], 'required'],
            [['description','url','git'], 'string'],
            [['date','checkboxList'], 'safe'],
            ['date', 'default', 'value'=>date('Y-m-d')],
            [['title'], 'string', 'max' => 128],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortfolioGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group Id',
            'title' => 'Title',
            'description' => 'Description',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }


    // Загрузка изображения;
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['group_id' => 'id']);
    }

    public function getImage()
    {
        return $this->hasOne(Images::className(), ['id' => 'group_id'])->where(['status'=>1,'main'=>1]);
    }
    // Путь изображения;
    public static function getImageHref($id,$options = false)
    {
        //
        if(!empty($id)) {
            $image = Images::find()->where(['group_id'=>$id, 'status' => 1, 'main' => 1])->one();
            if(empty($image)) return false;
            return  $image->getPathImage($options);
        }
        return false;
    }

    // Загрузка связные данные;
    public function getPortfolioDetails()
    {
        return $this->hasMany(PortfolioDetails::className(), ['portfolio_id' => 'id']);
    }
    public function getPortfolioDetail()
    {
        return $this->hasOne(PortfolioDetails::className(), ['id' => 'portfolio_id']);
    }

    // Массив в линие;
    public function getLineArray()
    {
        if(!empty($this->portfolioDetails)) return implode(', ',ArrayHelper::map(array_merge($this->portfolioDetails),'id','group_id'));
        return false;
    }
}
