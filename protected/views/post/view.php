<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

        <h1>
        <?php echo CHtml::link(CHtml::encode($model->title), array('view', 'id'=>$data->id)); ?>
	<br />
        </h1>
	
        <span>Автор: </span>
	<?php echo CHtml::encode($model->author->name); ?>        
	<br />

	<span>Дата: </span>
	<?php echo CHtml::encode($model->date_time); ?>
	<br />

	
	<?php echo CHtml::encode($model->text); ?>
	<br />


        <h2>Комментарии: </h2>
        <ul>
        <?php         
            foreach ($model->comments as $comment){
                echo '<li>'.$comment->text.'</li>';
            };
                       
         ?>
        </ul>
            