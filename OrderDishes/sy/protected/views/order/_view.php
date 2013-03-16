<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order_id), array('view', 'id'=>$data->order_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_table')); ?>:</b>
	<?php echo CHtml::encode($data->order_table); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_dish_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_dish_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_dish_state')); ?>:</b>
	<?php echo CHtml::encode($data->order_dish_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_dish_num')); ?>:</b>
	<?php echo CHtml::encode($data->order_dish_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_insert_time')); ?>:</b>
	<?php echo CHtml::encode($data->order_insert_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_list_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_list_id); ?>
	<br />


</div>