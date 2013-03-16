<?php
/* @var $this DishKindController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dish Kinds',
);

$this->menu=array(
	array('label'=>'Create DishKind', 'url'=>array('create')),
	array('label'=>'Manage DishKind', 'url'=>array('admin')),
);
?>

<h1>Dish Kinds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
