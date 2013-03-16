<?php
/* @var $this DishController */
/* @var $model Dish */

$this->breadcrumbs=array(
	'Dishes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dish', 'url'=>array('index')),
	array('label'=>'Manage Dish', 'url'=>array('admin')),
);
?>

<h1>Create Dish</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>