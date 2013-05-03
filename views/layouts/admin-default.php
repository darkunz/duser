<?php
/* @var $this CController */
$this->beginContent(Yii::app()->getModule('user')->appLayout);
?>

<div class="row-fluid">
    <div class="span3">
        <?php 
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'list',
            'items' => array(
                array(
                    'label' => 'Users',
                    'url' => array('/admin/user'),
                    'active' => Yii::app()->controller->module->id == 'user'
                ), 
                array(
                    'label' => 'Authorization',
                    'url' => array('/admin/user/auth'),
                    'active' => Yii::app()->controller->module->id == 'user/auth'
                ),
            ),
        )); 
        ?>
    </div>
    <div class="span9">
        <?= $content ?>
    </div>
</div>

<?php $this->endContent(); ?>