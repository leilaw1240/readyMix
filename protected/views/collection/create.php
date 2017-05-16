<?php
/* @var $this ReportController */
/* @var $model SchedulePayments */

$this->breadcrumbs=array(
	'Schedule Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SchedulePayments', 'url'=>array('index')),
	array('label'=>'Manage SchedulePayments', 'url'=>array('admin')),
);
?>

<h1>Create SchedulePayments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>