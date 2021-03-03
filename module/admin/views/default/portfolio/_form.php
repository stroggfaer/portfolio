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

// Загрузка группы;
$portfolioGroups = ArrayHelper::map(array_merge(\app\models\PortfolioGroups::find()->select(['id','title'])->where(['status'=>1])->orderBy('id ASC')->all()),'id','title');

// Обработка позиция;
$portfolio = \app\models\Portfolio::find()->orderBy('id ASC')->one();
$position = $portfolio->position += 1;
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название') ?>

    <?php // $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание');  ?>
     <?php if(false): ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]),

        'options' => ['rows' => 6],


    ])->label('Описание');  ?>
    <?php endif; ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание'); ?>

    
    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->label('Ссылка') ?>
    <?= $form->field($model, 'git')->textInput(['maxlength' => true])->label('Ссылка на git') ?>
    <?php
    // Загрузка изображения;
    if(!empty($model->id)) {
        echo '<div class="images-all">'. \app\components\cms\WImagesAll::widget(['model'=>$model]).'<div class="load-content"></div></div>';
    }
    ?>
     <?php if(!$model->isNewRecord): ?>
        <?=
        // http://demos.krajee.com/widget-details/fileinput; // Настройка input;
        //http://plugins.krajee.com/file-input#events // Настройка even
        $form->field($images, 'imageMax',['enableClientValidation' => false])->widget(
            FileInput::classname(), [
                'options' => ['multiple' => true, 'accept' => 'image/*'],
                'pluginOptions' => [
                    'previewFileType' => 'image',
                    'allowedFileExtensions'=>["jpg", "png", "jpeg", "bmp"],
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
                             loading_content('show');
                              $.post('/admin/ajax-backend/images-update-content',{'updateImagesContent':true,'id':".$model->id." },function(html){
                                  $(\"div.images-all\").html(html);
                                   loading_content('hide');
                              });
                          }
                     }",
                ],
            ]
        );
        ?>
    <?php endif; ?>



    <?php
     // print_arr($model->group_id);
      if(true):
    ?>
    <?= $form->field($model, 'checkboxList')->checkboxList($portfolioGroups,
        ['item' => function ($index, $label, $name, $checked, $value) use ($model)  {
            $items = !empty($model->portfolioDetails) ? ArrayHelper::map(array_merge($model->portfolioDetails),'group_id','id') : false;
            $check = (!empty($items[$value]) ? ' checked="checked"' : '');
            return "<div class='checkbox inline'><label><input type=\"checkbox\" $check  name=\"$name\" value=\"$value\"> <span>$label</span></label></div>";
        }]
    )->label('Группы')?>
    <?php endif; ?>

    <?= $form->field($model, 'position')->textInput(['value' => ($model->id ? $model->position : $position)])->label('Позиция'); ?>

    <?= $form->field($model, 'status')->checkbox(['disabled' => false,]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
