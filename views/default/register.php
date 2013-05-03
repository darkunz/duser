<?php

/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
Yii::import('bootstrap.widgets.TbActiveForm');
$this->pageTitle = Yii::app()->name . ' - Registration';
?>


<h1>Registration</h1>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<p><?= $form->errorSummary($model) ?></p>

<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'confirmPassword', array('class'=>'span3')); ?>
<div class="clearfix"></div>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Register')); ?>
 
<?php $this->endWidget(); ?>
