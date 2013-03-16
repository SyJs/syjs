<?php
/* @var $this DishController */
/* @var $data Dish */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dish_id), array('view', 'id'=>$data->dish_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_name')); ?>:</b>
	<?php echo CHtml::encode($data->dish_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_price')); ?>:</b>
	<?php echo CHtml::encode($data->dish_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_score')); ?>:</b>
	<?php echo CHtml::encode($data->dish_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_kind')); ?>:</b>
	<?php echo CHtml::encode($data->dish_kind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_reco')); ?>:</b>
	<?php echo CHtml::encode($data->dish_reco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_img')); ?>:</b>
	<?php echo CHtml::encode($data->dish_img); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_info')); ?>:</b>
	<?php echo CHtml::encode($data->dish_info); ?>
	<br />

	*/ ?>

</div>