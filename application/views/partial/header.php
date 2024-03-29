<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="<?=URL::to('/')?>img/favicon.png">
		<?=HTML::style('css/s36style.css')?> 
        <?=HTML::style('css/slider.css')?>
       
        <?=HTML::script('js/jquery.js')?>
        <?=HTML::script('js/slider.js')?>
        <?=HTML::script('js/jquery.cycle.all.min.js')?>
        <?=HTML::script('js/jquery.easing.js')?>        
</head>
<body>
<div id="the-main-content">
<!-- start header -->
<div id="headerwrapper">
	<div id="headersubwrapper">
    	<div id="headercontent">
        	<div id="mainlogo">
            <a href="index.php">
            	<?=HTML::image('img/36-storieslogo.png')?>
            </a>
            </div>
            <div id="top-nav">
            	<div id="nav-block">
                    <ul>
                        <li><?=HTML::link('/', 'Home')?></li>
                        <li><?=HTML::link('/tour#0', 'Tour')?></li>
                        <li><?=HTML::link('/pricing', 'Pricing')?></li>
						<li><?=HTML::link('/company', 'Company')?></li>
                    </ul>
                </div>
                <div id="login-block">
                	<?=HTML::link('/login', 'LOGIN')?>
                </div>
                <div id="social-icon-block">
                	<a href="#" title="Facebook Page"><?=HTML::image('img/head-fb-icon.png')?></a>
                    <a href="#" title="Twitter Page"><?=HTML::image('img/head-tw-icon.png')?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
