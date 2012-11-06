<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link id="stylesheet_main"  media="all   and (min-width:500px)" rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link id="stylesheet_form"  media="all   and (min-width:500px)"  rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link id="stylesheet_main" media="handheld,screen  and (max-width:500px)" rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/main2.css" />
	<link id="stylesheet_form" media="handheld,screen  and (max-width:500px)" rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl; ?>/css/form2.css" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php //Yii::app()->clientScript->registerPackage('logout'); ?>
<?php Yii::app()->clientScript->registerPackage('lightbox'); ?>

<div class="container" id="page">

	<div id="header">
		<div id="logo">ROSEWOOD<div id="fig"></div></div>
        
        <div id="head_right">
            <div id="h_contact">
                <div id="ph"></div>
                    <div>(985)-555-2012</div>
                <div id="sk"></div>
                    <div>mysite.com</div>
            </div>
            <div id="logout">
                <div id="log_name"><?=Yii::app()->user->name;?></div>
                    <div id="stick"> | </div>
                <div><?=CHtml::link('Exit',array('user/logout'));?></div>
            </div>
            <div id="login">
                <div><?=CHtml::link('Sign in',array('user/login'));?></div>
                <div><?=CHtml::link('Register',array('user/registration'));?></div>
            </div>
        </div>
        
	</div><!-- header -->
    
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('comments/index')),
            	array('label'=>'About', 'url'=>'#'),
            	array('label'=>'Downloads', 'url'=>'#'),
            	array('label'=>'Reviews', 'url'=>'#'),
            	array('label'=>'FAQ', 'url'=>'#'),
                array('label'=>'Start learning', 'url'=>'#'),
			),
		)); ?>
	</div><!-- mainmenu -->


	<?php echo $content; ?>

	<div class="clear"></div>
    <hr />
    
	<div id="footer">
		 <span id="f1">&copy; Copyright <?php echo date('Y'); ?></span>
         <span id="f2"> Technical support <?=CHtml::mailTo('support@mysite.ru')?></span>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
