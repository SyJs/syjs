<?php
/* @var $this DishController */
/* @var $model Dish */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dish-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_name'); ?>
		<?php echo $form->textField($model,'dish_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'dish_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_price'); ?>
		<?php echo $form->textField($model,'dish_price'); ?>
		<?php echo $form->error($model,'dish_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_score'); ?>
		<?php echo $form->textField($model,'dish_score'); ?>
		<?php echo $form->error($model,'dish_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_kind'); ?>
		<?php echo $form->textField($model,'dish_kind',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'dish_kind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_reco'); ?>
		<?php echo $form->textField($model,'dish_reco'); ?>
		<?php echo $form->error($model,'dish_reco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_img'); ?>
		<?php echo $form->textField($model,'dish_img',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'dish_img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dish_info'); ?>
		<?php echo $form->textField($model,'dish_info',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'dish_info'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->