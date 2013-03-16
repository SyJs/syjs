<?php
/* @var $this DishKindController */
/* @var $data DishKind */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_kind_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dish_kind_id), array('view', 'id'=>$data->dish_kind_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dish_kind_name')); ?>:</b>
	<?php echo CHtml::encode($data->dish_kind_name); ?>
	<br />


</div>