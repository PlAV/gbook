<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $this->widget('application.extensions.elrte.elRTE', array(
    'selector'=>'text',
    'cssClass' => 'el-rte',
    'absoluteURLs' => 'false',
    'allowSource' => 'true',
    'lang' => 'ru',
    'styleWithCSS' => 'true',
    'height' => '200',
    'width' => '400',
    'fmAllow' => 'true',
    'toolbar' => 'myToolbar',
 ));?>

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
   
	<div id="text"><?=$form->labelEx($model,'text'); ?></div>
       <?=$form->error($model,'text'); ?>
    
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

<?php $this->endWidget();








 ?>




</div><!-- form -->