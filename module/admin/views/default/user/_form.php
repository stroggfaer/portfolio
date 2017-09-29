<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-normal','data-status'=>1],
       // 'enableAjaxValidation'   => true,
       // 'enableClientValidation' => true,
        'validateOnBlur'         => false,
        'validateOnType'         => false,
        'validateOnChange'       => false,
      //  'validateOnSubmit'       => true,
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Пользователь');  ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Емаил'); ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>

    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Повторить пароль'); ?>

    <?= $form->field($model, 'status')->checkbox(['disabled' => false,]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
