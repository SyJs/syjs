<?php
/* @var $this OrderListController */
/* @var $model OrderList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-list-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_dish_list'); ?>
		<?php echo $form->textField($model,'order_dish_list',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'order_dish_list'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_list_price'); ?>
		<?php echo $form->textField($model,'order_list_price',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'order_list_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_list_time'); ?>
		<?php echo $form->textField($model,'order_list_time'); ?>
		<?php echo $form->error($model,'order_list_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->