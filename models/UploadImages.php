<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;


class UploadImages extends Model
{
    /**
     * @var UploadedFile[]
     */

    //
    public $imageMax;
    public $imageMin;

    public function rules()
    {
        return [
           // [['imageFiles'], 'file', 'extensions' => 'png, jpg, gif', 'maxFiles' => 6],
            [['imageMax','imageMin'], 'file',  'extensions' => 'png, jpg'],
        ];
    }

    /*---------- Загружаем изображения;------------*/
    public function isUpload($file=false,$width=1024,$height=false,$min=false,$minWidth = 600,$minHeight= false)
    {
        //$fileDir = Helpers::aliases_file($file,true);

        //
        if ($this->validate()) {

            if(empty($this->imageMax->extension)) return false;
            $fileDir =  $file . '.' . $this->imageMax->extension;

            $this->imageMax->saveAs($fileDir);

           // if(!empty($width)) Helpers::iResize($fileDir,$width,$height);

            // Для обложки;
            if(!empty($min))  {
              //  $fileDirMin = Helpers::aliases_file($file,true) . '_min.' . $this->imageMax->extension;
              // Helpers::iCopy($fileDir,$fileDirMin);
               // Helpers::iResize($fileDirMin,$minWidth,$minHeight);
            }

            return true;
        } else {
            return false;
        }
    }


}



