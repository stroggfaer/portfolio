<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortfolioGroups */

$this->title = 'Редактировать группа портфолио';
$this->params['breadcrumbs'][] = ['label' => 'Portfolio Groups', 'url' => ['portfolio-groups']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
