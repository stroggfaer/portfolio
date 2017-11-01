<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CmsAsset;

CmsAsset::register($this);
$session = Yii::$app->session;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="loadAjax"><div class="loader"></div></div>
<div class="wrap">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container ">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CMS</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php if(!empty(\Yii::$app->controller->actionNavigation)): ?>
                    <?php foreach(\Yii::$app->controller->actionNavigation as $key=>$value): ?>
                       <li class=""><a href="<?=$value['link']?>"><?=$value['title']?></a></li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
             </div>
        </div>
    </nav>

    <div class="container load-contents">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
