<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_table'); ?>
		<?php echo $form->textField($model,'order_table'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_dish_id'); ?>
		<?php echo $form->textField($model,'order_dish_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_dish_state'); ?>
		<?php echo $form->textField($model,'order_dish_state',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_dish_num'); ?>
		<?php echo $form->textField($model,'order_dish_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_insert_time'); ?>
		<?php echo $form->textField($model,'order_insert_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_list_id'); ?>
		<?php echo $form->textField($model,'order_list_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->