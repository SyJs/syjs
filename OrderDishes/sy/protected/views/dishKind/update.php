<?php
/* @var $this DishKindController */
/* @var $model DishKind */

$this->breadcrumbs=array(
	'Dish Kinds'=>array('index'),
	$model->dish_kind_id=>array('view','id'=>$model->dish_kind_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DishKind', 'url'=>array('index')),
	array('label'=>'Create DishKind', 'url'=>array('create')),
	array('label'=>'View DishKind', 'url'=>array('view', 'id'=>$model->dish_kind_id)),
	array('label'=>'Manage DishKind', 'url'=>array('admin')),
);
?>

<h1>Update DishKind <?php echo $model->dish_kind_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>