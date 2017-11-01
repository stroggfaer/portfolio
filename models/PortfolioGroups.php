<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio_groups".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $status
 *
 * @property Portfolio[] $portfolios
 */
class PortfolioGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status','position'], 'integer'],
            [['title'], 'string', 'max' => 128],
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
            'description' => 'Description',
            'position' => 'Position',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolios()
    {
        return $this->hasMany(Portfolio::className(), ['group_id' => 'id']);
    }
}
