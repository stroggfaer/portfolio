<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DefaultAsset;
use app\models\Pages;
use app\models\Options;
DefaultAsset::register($this);

if (!Yii::$app->user->isGuest) {
  //  print_arr(Yii::$app->user);

}else{

}
$menu = Pages::find()->where(['status'=>1])->all();
$options = Options::find()->where(['id'=>1000,'status'=>1])->one();
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=“robots” content=“noindex,nofollow”>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="silver-bg">
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer black-bg-1">
    <div class="container">
        <p class="pull-left danger-com">&copy; <?=$options->title?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
