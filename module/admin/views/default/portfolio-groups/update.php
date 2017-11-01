<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioGroups */

$this->title = 'Редактировать профоило групп: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Portfolio Groups', 'url' => ['portfolio-groups']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view-portfolio-groups', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="portfolio-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
