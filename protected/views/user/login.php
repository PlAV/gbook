
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation' => TRUE,
    'clientOptions' => array(
            'validateOnSubmit' => TRUE,
            'validateOnChange' => TRUE,
        ),
    'focus'=>array($model,'login'),
  
)); ?>

	

	<div>
        <h2>Sign in</h2>
    </div>
    <div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
        <?php echo $form->error($model,'login'); ?>
		
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,"password"); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
    <div class="row">
		<?php echo $form->hiddenField($model,"user_status"); ?>
		<?php echo $form->error($model,'user_status'); ?>
	</div>
    
    <div class="clear"></div> 
    
    <div class="row buttons">
		<div class="submit"><?=CHtml::submitButton('Sign in', array('id' => "submit")); ?></div>
    </div>

<?php $this->endWidget(); ?>
    

</div><!-- form -->