<?php

namespace app\components;
use yii\base\Widget;
use yii\bootstrap\ActiveForm;
use Yii;


class WForma extends Widget{
    public $model;


    public function run(){
         if(empty($this->model)) return false;
        ?>


        <?php $form = ActiveForm::begin([
            'options' => ['id' => 'orders'],
            'enableAjaxValidation'   => true,
            'enableClientValidation' => true,
            'validateOnBlur'         => false,
            'validateOnType'         => false,
            'validateOnChange'       => false,
            'validateOnSubmit'       => true,
        ]); ?>
            <?= $form->field($this->model, 'name')->textInput(['class'=>'form-control string placeholder','placeholder'=>'Ваше имя'])->label(false)?>
            <?= $form->field($this->model, 'email')->textInput(['class'=>'form-control string placeholder','placeholder'=>'Ваш email'])->label(false)?>
            <?= $form->field($this->model, 'text')->textarea(['class'=>'form-control text placeholder','rows'=> 3,'placeholder'=>'Дополнительная информация'])->label(false)?>
             <div class="text-center"><button id="buttonAj" type="submit" data-loading-text="Пожалуйста подождите форма отправляется..." value="true" name="send" class="btn btn-black  wave-effect">Отправить</button></div>
        <?php ActiveForm::end(); ?>

        <?php
    }
}

