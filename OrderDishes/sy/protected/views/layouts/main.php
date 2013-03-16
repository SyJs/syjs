<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
 
       <style>
           #login {
               float: right;
               margin: 20px 60px 0 0;
           }
       </style>
</head>

<body>

<div class="container" id="page">
	<div id="header">
                 <div id="login">
                    <?php
                        if(Yii::app()->user->isGuest) {
                            echo '<a href="'.Yii::app()->baseUrl.'/index.php/site/login">登录</a>';
                        } else {
                            echo '<span>欢迎您, '.Yii::app()->user->name.'   </span><a href="'.Yii::app()->baseUrl.'/index.php/site/logout">登出</a>';
                        }
                    ?>
                </div>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        </div><!-- header -->
   
        
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'首页', 'url'=>array('/site/index')),
				array('label'=>'菜肴', 'url'=>array('/dish')),
				array('label'=>'菜肴种类', 'url'=>array('/dishkind')),
				array('label'=>'用户', 'url'=>array('/user')),
				array('label'=>'订单', 'url'=>array('/order')),
				array('label'=>'关于', 'url'=>array('/site/page', 'view'=>'about'))
                        ),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Sykent.<br/>
		All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
