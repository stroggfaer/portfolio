<?php
namespace app\module\admin\controllers;

use app\models\Images;

use app\models\Portfolio;
use Yii;
use yii\web\UploadedFile;
use app\models\ResizeImages;

use app\models\UploadImages;




class AjaxBackendController extends BackendController
{
    // Загрузка несколько файлов;
    public function actionFileUpload()
    {
        // Ответ данные JSON-формат;
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $_post = Yii::$app->request->post();

        // Загрузка;
        $uploadImages = new UploadImages();

        // Объект параметрый изображения;
        $uploadImages->imageMax = UploadedFile::getInstance($uploadImages, 'imageMax');

        // Загрузка изображения и запись БД;
        $images = new Images();
        $images->group_id = intval($_post['group_id']);
        $images->hash = Yii::$app->security->generateRandomString() . '_' . time();
        $images->exp = $uploadImages->imageMax->extension;
        if($images->save()) {
            // Обложка картина;
            $mainCoverCount = Images::find()->where(['group_id'=> intval($_post['group_id']),'main'=>1,'status'=>1])->count();
            if($mainCoverCount < 1) {
                $mainCover = Images::find()->where(['id' => $images->id])->one();
                $mainCover->main = 1;
                $mainCover->update(false); // Обновления запрос;
            }
            // Путь к изображением;
            $path = $_SERVER['DOCUMENT_ROOT'] . $_post['path'] . $images->id;
            $uploadImages->isUpload($path);
            return $response->data = ['success' => true];
        }
        return $response->data = ['error' => true];
    }


    // Удаления изображения;
    public function actionImagesDelete()
    {
        $image_id = Yii::$app->request->post('image_id');
        $id = Yii::$app->request->post('id');
        // Удаления изображения;
        if(Yii::$app->request->post('deleteImages') && $id !== 'null' &&  $image_id !== 'null') {
            $model = Portfolio::findOne($id);
            // Загрузка изображения;
            $images = Images::findOne($image_id);
            $dirFiles = $_SERVER['DOCUMENT_ROOT'] . \Yii::$app->params['img_max'];
            // Удаляем файл;
            ResizeImages::fileDelete($dirFiles,$images->id.'.'.$images->exp);
            ResizeImages::fileDelete($dirFiles,$images->id.'_min.'.$images->exp);
            // Удаляем запись таблицы;
            $images->delete();
            return \app\components\cms\WImagesAll::widget([
                'model' => $model
            ]);
        }else{
            return false;
        }
    }

    // Обложка изображение товара;
    public function actionCoverImages()
    {

        $id = Yii::$app->request->post('id');
        $image_id = Yii::$app->request->post('image_id');
        if(Yii::$app->request->post('coverImages') && $id && $image_id) {
            $model = Portfolio::findOne($id);
            $image = Images::findOne($image_id);
            $image->main = ($image->main ? 0 : 1);
            if($image->save()) {
                $images = Images::find()->where(['group_id' => $id])->andWhere('id != :id',['id' =>$image_id])->all();
                foreach($images as $value) {
                    $value->main = 0;
                    $value->update(false);
                }
            }
            return \app\components\cms\WImagesAll::widget([
                'model' => $model
            ]);
        }else{
            return false;
        }
    }


    // Обновления виджет;
    public function actionImagesUpdateContent()
    {
        $id = Yii::$app->request->post('id');
        if(Yii::$app->request->post('updateImagesContent') && $id) {
            $model = Portfolio::findOne($id);
            return \app\components\cms\WImagesAll::widget([
                'model' => $model
            ]);
        }else{
            return false;
        }
    }


}