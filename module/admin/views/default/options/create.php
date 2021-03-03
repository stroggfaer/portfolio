<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Options */

$this->title = 'Добавить настройка';
$this->params['breadcrumbs'][] = ['label' => 'Настройка', 'url' => ['options']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
