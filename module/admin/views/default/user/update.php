<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Редактировать пользователь: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователь', 'url' => ['user']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view-user', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
