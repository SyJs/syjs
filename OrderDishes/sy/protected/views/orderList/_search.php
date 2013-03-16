<?php
/* @var $this OrderListController */
/* @var $model OrderList */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'order_list_id'); ?>
		<?php echo $form->textField($model,'order_list_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_dish_list'); ?>
		<?php echo $form->textField($model,'order_dish_list',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_list_price'); ?>
		<?php echo $form->textField($model,'order_list_price',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_list_time'); ?>
		<?php echo $form->textField($model,'order_list_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->