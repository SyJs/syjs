<?php
/* @var $this DishKindController */
/* @var $model DishKind */

$this->breadcrumbs=array(
	'Dish Kinds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DishKind', 'url'=>array('index')),
	array('label'=>'Create DishKind', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dish-kind-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dish Kinds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dish-kind-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'dish_kind_id',
		'dish_kind_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
