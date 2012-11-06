<?php
/* @var $this CommentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments',
);


?>

<h2>Recent Comments</h2>

<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->search(),
        'columns'=>array(
            'user_name',
            'email',
            'homepage',
            //'date',
            'text',
            
            array(
                'name'=>'file_name',
                'type'=>'raw',
                'value'=>'$data->getImageForGrid($data->id)',
                
            ),
            array(
                'name'=>'date', 
                'htmlOptions'=>array('style'=>'text-align: center'),
                'value'=>'date_format(date_create($data->date), "Y-m-d H:i:s")',
            ),
        ),
        'pager'=>array(
            'class'=>'CLinkPager',
            'maxButtonCount' => 5, // максимальное вол-ко кнопок <- 1..2..3..4..5 ->
            
            
        )
    ));
?>
<div id="сommBut"><?=CHtml::button('Add comment')?></div>

<?=$this->renderPartial('_form',array('model'=>$model));?>


