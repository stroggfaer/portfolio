<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Options */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update-options', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete-options', 'id' => $model->id], [
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
            'title',
            'phone',
            'email:email',
            'adminEmail:email',
            'logo',
            'url:url',
            'description',
            'status',
        ],
    ]) ?>

</div>
