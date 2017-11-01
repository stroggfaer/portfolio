<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['user']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update-user', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete-user', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label'     => 'Дата создания',
                'attribute' => 'created_at',
                'format' =>  ['date', 'php:d.m.Y'],
                //'options' => ['width' => '100']
            ],
            [
                'label'     => 'Дата обновления',
                'attribute' => 'updated_at',
                'format' =>  ['date', 'php:d.m.Y'],
                //'options' => ['width' => '100']
            ],
            'username',
            'phone',
          //  'auth_key',
            //'email_confirm_token:email',
          //  'password_hash',
          //  'password_reset_token',
            'email:email',
            'status',
        ],
    ]) ?>

</div>
