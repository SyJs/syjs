<?php
/* @var $this DishKindController */
/* @var $model DishKind */

$this->breadcrumbs=array(
	'Dish Kinds'=>array('index'),
	$model->dish_kind_id,
);

$this->menu=array(
	array('label'=>'List DishKind', 'url'=>array('index')),
	array('label'=>'Create DishKind', 'url'=>array('create')),
	array('label'=>'Update DishKind', 'url'=>array('update', 'id'=>$model->dish_kind_id)),
	array('label'=>'Delete DishKind', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dish_kind_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DishKind', 'url'=>array('admin')),
);
?>

<h1>View DishKind #<?php echo $model->dish_kind_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dish_kind_id',
		'dish_kind_name',
	),
)); ?>
