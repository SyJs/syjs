<?php
/* @var $this DishKindController */
/* @var $model DishKind */

$this->breadcrumbs=array(
	'Dish Kinds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DishKind', 'url'=>array('index')),
	array('label'=>'Manage DishKind', 'url'=>array('admin')),
);
?>

<h1>Create DishKind</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>