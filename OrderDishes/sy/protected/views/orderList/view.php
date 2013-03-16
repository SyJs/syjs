<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	'Order Lists'=>array('index'),
	$model->order_list_id,
);

$this->menu=array(
	array('label'=>'List OrderList', 'url'=>array('index')),
	array('label'=>'Create OrderList', 'url'=>array('create')),
	array('label'=>'Update OrderList', 'url'=>array('update', 'id'=>$model->order_list_id)),
	array('label'=>'Delete OrderList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->order_list_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
);
?>

<h1>View OrderList #<?php echo $model->order_list_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_list_id',
		'order_dish_list',
		'order_list_price',
		'order_list_time',
	),
)); ?>
