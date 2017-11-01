<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $hash
 * @property string $img
 * @property integer $status
 *
 * @property Portfolio[] $portfolios
 */
class Images extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'required'],
            [['status','group_id'], 'integer'],
            [['hash'], 'string', 'max' => 228],
            [['exp'], 'string', 'max' => 128],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'img' => 'Img',
            'status' => 'Status',
        ];
    }

    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'group_id']);
    }
    public function getPortfolios()
    {
        return $this->hasMany(Portfolio::className(), ['group_id' => 'id']);
    }

    // Путь изображение;
    public function getPathImage($option = false)
    {
            $img_min = \Yii::$app->params['img_max'].$this->id.'_min.'.$this->exp;
            $img =  \Yii::$app->params['img_max'].$this->id.'.'.$this->exp;
            $images = (!empty($option) ? $img_min : $img);
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$images)) {
                return $images;
            }else{
                return \Yii::$app->params['no_images'];
            }
    }


}
