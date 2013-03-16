<?php
/* @var $this DishController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dishes',
);

$this->menu=array(
	array('label'=>'Create Dish', 'url'=>array('create')),
	array('label'=>'Manage Dish', 'url'=>array('admin')),
);
?>

<h1>Dishes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
