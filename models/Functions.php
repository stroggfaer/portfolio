<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Functions extends Model
{
    // Проверка файл;
    public static function fileDir($file = false){

        if(!empty($file) && file_exists(Yii::getAlias('@app').$file.'.php')){
            return true;
        }else{
            return false;
        }
    }
}
