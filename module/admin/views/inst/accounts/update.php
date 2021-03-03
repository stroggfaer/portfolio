<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstLogin */

$this->title = 'Update Inst Login: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Inst Logins', 'url' => ['accounts']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view-accounts', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inst-login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
