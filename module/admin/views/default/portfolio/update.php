<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */

$this->title = 'Редактировать портфолио: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['portfolio']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view-portfolio', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="portfolio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'images' => $images,
    ]) ?>

</div>
