<?php
/* @var $this DishController */
/* @var $model Dish */

$this->breadcrumbs=array(
	'Dishes'=>array('index'),
	$model->dish_id=>array('view','id'=>$model->dish_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dish', 'url'=>array('index')),
	array('label'=>'Create Dish', 'url'=>array('create')),
	array('label'=>'View Dish', 'url'=>array('view', 'id'=>$model->dish_id)),
	array('label'=>'Manage Dish', 'url'=>array('admin')),
);
?>

<h1>Update Dish <?php echo $model->dish_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>