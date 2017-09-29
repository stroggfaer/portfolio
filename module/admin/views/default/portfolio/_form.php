<?php
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
// composer require --prefer-dist mihaildev/yii2-elfinder "*"

?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название') ?>

    <?php // $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание');  ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]),

        'options' => ['rows' => 6],


    ])->label('Описание');  ?>
    <?php
    // Загрузка изображения;
    if(!empty($model->id)) {
        echo '<div class="images-all">'. \app\components\cms\WImagesAll::widget(['model'=>$model]).'</div>';
    }
    ?>
     <?php if(!$model->isNewRecord): ?>
        <?=
        // http://demos.krajee.com/widget-details/fileinput; // Настройка input;
        //http://plugins.krajee.com/file-input#events // Настройка even
        $form->field($images, 'imageMax',['enableClientValidation' => false])->widget(
            FileInput::classname(), [
                'options' => ['multiple' => true],
                'pluginOptions' => ['previewFileType' => 'image',
                    'uploadUrl' => Url::to(['/admin/ajax-backend/file-upload']),
                    'uploadExtraData' => [
                        'group_id' => $model->id,
                        'path' => \Yii::$app->params['img_max'],
                    ],
                    'maxFileCount' => 6
                ],
                'pluginEvents' => [
                    "fileuploaded" => "function(event, data, previewId, index) {
                          var response = data.response;
                          if(response.success) {
                              $.post('/admin/ajax-backend/images-update-content',{'updateImagesContent':true,'id':".$model->id." },function(html){
                                  $(\"div.images-all\").html(html);
                              });
                          }
                     }",
                ],
            ]
        );
        ?>
    <?php endif; ?>


    <?= $form->field($model, 'status')->checkbox(['disabled' => false,]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
