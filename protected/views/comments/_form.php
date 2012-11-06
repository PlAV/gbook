<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'focus'=>array($model,'user_name'),
)); ?>
    <h2>Add comment</h2>
	<p class="note"><span class="required">*</span>required fields .</p>
    <div class="row">
		<?=$form->labelEx($model,'user_name'); ?>
		<?=$form->textField($model,'user_name'); ?>
		<?=$form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?=$form->labelEx($model,'email'); ?>
		<?=$form->emailField($model,'email'); ?>
		<?=$form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?=$form->labelEx($model,'homepage'); ?>
		<?=$form->textField($model,'homepage'); ?>
		<?=$form->error($model,'homepage'); ?>
	</div>
   
	 <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                    'model'=>$model,
                    'attribute'=>'text',
                    'editorTemplate'=>'advanced',
                    'fontSizes'=>array('11'=>'11px'),
                    'options'=>array('width'=>'400px'),
                    
                     
    )); ?>
    <div class="row">
		<?=$form->labelEx($model,'file'); ?>
		<?=$form->fileField($model,'file'); ?>
		<?=$form->error($model,'file');?>
        <span><?="jpg,gif,png,txt"?></span>
	</div>
    <div class="row">
        <?if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
            <?=CHtml::activeLabelEx($model, 'verifyCode')?>
            <div>
                <?php $this->widget('CCaptcha',array('clickableImage' => true))?>
            </div>
            <?=CHtml::activeTextField($model, 'verifyCode')?>
            <?=$form->error($model,'verifyCode'); ?>
        <?endif?>
    </div>
	<div class="row buttons">
		<?=CHtml::submitButton('Add it !', array('id' => "submit")); ?>
        
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->