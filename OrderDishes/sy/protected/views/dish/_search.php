<?php
/* @var $this DishController */
/* @var $model Dish */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'dish_id'); ?>
		<?php echo $form->textField($model,'dish_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_name'); ?>
		<?php echo $form->textField($model,'dish_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_price'); ?>
		<?php echo $form->textField($model,'dish_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_score'); ?>
		<?php echo $form->textField($model,'dish_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_kind'); ?>
		<?php echo $form->textField($model,'dish_kind',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_reco'); ?>
		<?php echo $form->textField($model,'dish_reco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_img'); ?>
		<?php echo $form->textField($model,'dish_img',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dish_info'); ?>
		<?php echo $form->textField($model,'dish_info',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->