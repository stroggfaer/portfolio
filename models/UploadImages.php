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
            [['imageMax','imageMin'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /*---------- Загружаем изображения;------------*/
    public function isUpload($file = false, $width = 1024, $height = false, $option = 'auto')
    {

        //
        if ($this->validate()) {

            if(empty($this->imageMax->extension)) return false;
            $fileDir =  $file . '.' . $this->imageMax->extension;

            $this->imageMax->saveAs($fileDir);

            if(!empty($width)) {
                $resizeImages = new ResizeImages($fileDir);
                $resizeImages->resizeImage($width,$height,$option);
                $resizeImages->saveImage($fileDir, 100);
                $resizeImages->mCopy($fileDir,$file . '_min.' . $this->imageMax->extension,640,480,'crop');
            }
            return true;

        } else {
            return false;
        }
    }


}



