<?php
/* @var $this OrderListController */
/* @var $data OrderList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_list_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order_list_id), array('view', 'id'=>$data->order_list_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_dish_list')); ?>:</b>
	<?php echo CHtml::encode($data->order_dish_list); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_list_price')); ?>:</b>
	<?php echo CHtml::encode($data->order_list_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_list_time')); ?>:</b>
	<?php echo CHtml::encode($data->order_list_time); ?>
	<br />


</div>