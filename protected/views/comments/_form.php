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
   
	<?php $this->widget('ext.fckeditor.FCKEditorWidget', array(
      "model"=>$model,
      "attribute"=>'text',
      "height"=>'200px',
      "width"=>'300px',
      //"toolbarSet"=>'Basic',
      "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
      "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
      "config" => array(
        "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',
        "toolbarSet"=>'new')
      ,
        
        # http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
      )
    );?>
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