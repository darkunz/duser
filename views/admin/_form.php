<?php
$model->password = null;
?>
<div class="span12">
    <a href="<?= $this->createUrl('index') ?>">List</a>
</div>
<div class="span12">
    <h1><?= ucfirst($this->action->id) ?> User</h1>
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'verticalForm',
    ));
    ?>

    <p><?= $form->errorSummary($model) ?></p>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span3')); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>
    <?php echo $form->checkboxRow($model, 'status'); ?>
    <?php // echo $form->passwordFieldRow($model, 'confirmPassword', array('class' => 'span3')); ?>
    <div class="clearfix"></div>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Save')); ?>

    <?php $this->endWidget(); ?>
</div>