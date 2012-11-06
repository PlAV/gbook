
    
<h1>New user registration</h1><hr />

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
        <h2>Registration information</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ipsum neque, dictum dignissim viverra eu, aliquam elementum nibh. Fusce nibh felis, vestibulum vel congue non, congue eget quam. Donec nec augue elit. Phasellus felis felis, rutrum eu porta a, volutpat et metus.</p>
    </div>
    <div class="row row1">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login'); ?>
        <?php echo $form->error($model,'login'); ?>
		
	</div>
    <div class="row row2">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,"email"); ?>
		<?php echo $form->error($model,'email'); ?>
	</div> 
    <div class="clear"></div>   
    <div class="row row3">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,"password"); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
    <div class="row row4">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,"password2"); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
    <div class="clear"></div> 
    <hr />
    <div>
        <h2>Personal data</h2>
    </div>
    
    
    <div class="row row5">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
        
	</div>

	<div class="row row6">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name'); ?>
		<?php echo $form->error($model,'last_name'); ?>
        
	</div>
    <div class="clear"></div> 

	<div class="row row7">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype'); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>
    <div class="row row8">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
    <div class="clear"></div> 
    <div class="row row9">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>
    <div class="row row10">
		<?php echo $form->labelEx($model,'country'); ?>
        <?php echo $form->dropDownList($model,'country',array('Ukraine','Russia'),array('empty'=>'Select country'));?>
		<?php echo $form->error($model,'country'); ?>
    </div>
	<div class="clear"></div> 

	<div class="buttons">
		<div id="regi" class="f_but"><?=CHtml::submitButton('Join Now!', array('id' => "submit")); ?></div>
    </div>

<?php $this->endWidget(); ?>
    

</div><!-- form -->