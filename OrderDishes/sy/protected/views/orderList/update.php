<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	'Order Lists'=>array('index'),
	$model->order_list_id=>array('view','id'=>$model->order_list_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderList', 'url'=>array('index')),
	array('label'=>'Create OrderList', 'url'=>array('create')),
	array('label'=>'View OrderList', 'url'=>array('view', 'id'=>$model->order_list_id)),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
);
?>

<h1>Update OrderList <?php echo $model->order_list_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>