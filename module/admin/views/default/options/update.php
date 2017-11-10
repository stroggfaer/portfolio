<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Options */

$this->title = 'Редактировать настройка: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройка', 'url' => ['options']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view-options', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="options-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
