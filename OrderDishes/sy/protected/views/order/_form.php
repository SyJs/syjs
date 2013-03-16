<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_table'); ?>
		<?php echo $form->textField($model,'order_table'); ?>
		<?php echo $form->error($model,'order_table'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_dish_id'); ?>
		<?php echo $form->textField($model,'order_dish_id'); ?>
		<?php echo $form->error($model,'order_dish_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_dish_state'); ?>
		<?php echo $form->textField($model,'order_dish_state',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'order_dish_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_dish_num'); ?>
		<?php echo $form->textField($model,'order_dish_num'); ?>
		<?php echo $form->error($model,'order_dish_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_insert_time'); ?>
		<?php echo $form->textField($model,'order_insert_time'); ?>
		<?php echo $form->error($model,'order_insert_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_list_id'); ?>
		<?php echo $form->textField($model,'order_list_id'); ?>
		<?php echo $form->error($model,'order_list_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->