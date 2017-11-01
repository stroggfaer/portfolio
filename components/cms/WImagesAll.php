<?php

namespace app\components\cms;
use yii\base\Widget;

class WImagesAll extends Widget{
    public $model;
    public function run(){
        if ($this->model === null) {
            $this->model = false;
        }
        ?>
        <?php foreach($this->model->images as $key => $image): ?>
            <?php
               // print_arr($image->pathImage);
            ?>
            <div class="item">
                <div class="panel-op">
                    <span class="glyphicon <?=($image->main? 'glyphicon-ok-sign success-com' : 'glyphicon-plus-sign primary-com')?>" title="<?=($image->main? 'Убрать обложка' : 'Добавить обложка') ?> " onclick="cover_images('<?=$image->id ?>','<?=$this->model->id ?>');"></span>
                    <?php if(empty($image->main)): ?>
                      <span class="glyphicon glyphicon-remove-sign danger-com" title="Удалить?" onclick="delete_images('<?=$image->id ?>','<?=$this->model->id ?>');"></span>
                    <?php endif; ?>
                </div>
                <a href="#"><img src="<?=$image->getPathImage(true)?>" alt=""></a>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
        <?php
    }
}

