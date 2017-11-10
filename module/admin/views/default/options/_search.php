<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\admin\models\PostSearchOptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'adminEmail') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
