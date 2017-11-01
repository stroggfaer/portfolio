<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio_details".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $portfolio_id
 * @property integer $status
 *
 * @property PortfolioGroups $group
 * @property Portfolio $portfolio
 */
class PortfolioDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'portfolio_id', 'status'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortfolioGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['portfolio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Portfolio::className(), 'targetAttribute' => ['portfolio_id' => 'id']],
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
            'portfolio_id' => 'Portfolio ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(PortfolioGroups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioDetails()
    {
        return $this->hasMany(PortfolioDetails::className(), ['portfolio_id' => 'id'])->where(['status'=>1]);
    }
}
