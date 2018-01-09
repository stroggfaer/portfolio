<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InstLogin */

$this->title = 'Create Inst Login';
$this->params['breadcrumbs'][] = ['label' => 'Inst Logins', 'url' => ['accounts']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inst-login-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
