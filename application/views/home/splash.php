<!doctype html>
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head id="its-a-square-countdown">

	<meta charset="utf-8">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>36Stories - Get amazing feedback for your brand and business.</title>
	
	<meta name="title" content="Add a descriptive title for your page">
	<meta name="description" content="A descriiption of the your Site|Page|Application|Etc">
	<!-- Google will often use this as its description of your page/site. Make it good. -->
	
	<meta name="google-site-verification" content="">
	<!-- Add your site to: http://google.com/webmasters -->
	
	<meta name="author" content="It's a Square">
	<meta name="Copyright" content="Copyright 36Stories 2010. All Rights Reserved.">

    <link rel="shortcut icon" href="_/img/favicon.ico">
	<!-- <link rel="shortcut icon" href="_/img/favicon.ico">
	   - This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK
		 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
		 
	<!-- <link rel="apple-touch-icon" href="_/img/apple-touch-icon.png">
	   - The is the icon for iOS's Web Clip.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
     - Transparency is not recommended (iOS will put a black BG behind the icon) -->

  <!-- Links to google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  
  <!--
  If you wish to continue to use lesscss for development, un-comment the line below during development. Learn more about less at lesscss.org
  -->
  <!-- <link rel="stylesheet/less" href="_/css/style.less" type="text/css" media="all" /> -->
  
  
    <!-- Select your page color, uncomment the appropriate stylesheet -->
    
    <!-- Blue Skin -->
    <!-- <link rel="stylesheet" href="_/css/style_green.css" />  -->
    
    <!-- Blue Skin -->
	<?=HTML::style('css/style_blue.css')?> 
    <!-- Red Skin -->
    <!-- <link rel="stylesheet" href="_/css/style_red.css" /> --> 
    
    <!-- Orange Skin -->
    <!-- <link rel="stylesheet" href="_/css/style_orange.css" /> -->
    
    <!-- Grey Skin -->
    <!-- <link rel="stylesheet" href="_/css/style_grey.css" /> -->
    
    <!-- Purple Skin -->
    <!-- <link rel="stylesheet" href="_/css/style_purple.css" /> -->
    
    <!-- Magenta Skin -->
    <!-- <link rel="stylesheet" href="_/css/style_magenta.css" />  --> 

	<!-- all JS is at the bottom of the page, except for Modernizr. -->
    <?=HTML::script('js/libs/modernizr-1.7.min.js')?>

</head>

<body>
<!-- 
<nav id="style_menu">

  <div class="label">Change Color</div>

  <ul class="color_options">
    <li class="green"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/green/">Green</a></li>
    <li class="blue"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/blue/">Blue</a></li>
    <li class="red"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/red/">Red</a></li>
    <li class="purple"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/purple/">Purple</a></li>
    <li class="orange"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/orange/">Orange</a></li>
    <li class="magenta"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/magenta/">Magenta</a></li>
    <li class="grey"><a href="http://www.itsasquare.com/themes/landing_pages/CD001/grey/">Grey</a></li>    
  </ul>

</nav>
-->
<div class="page">
  <header>
    <div class="logo">
      <!--<img src="_/img/36StoriesLogo.png" />-->
      <?=HTML::image('img/36-storieslogo.png')?>
    </div>
   
    <!--<h1><span>36Stories</span></h1>-->
    <p>Get amazing feedback for your brand and business.</p>
   
  </header>
  
  <section class="content">
    <!--
    <p>Get amazing feedback for your brand and business.</p>
    -->
    <!-- Div to hold countdown created by jquery.countdown -->
    <!--
    <div class="countdown">
      
    </div>
    -->
  </section>
  
  <!-- Signup Form -->
  <section class="signup">
    <form action="" method="post" id="notification-email" accept-charset="utf-8">
      <label for="sender_email">Get notified when we launch!</label>
      <div class="notification_signup">
        <input type="text" name="email" id="sender_email" placeholder="Enter your email address"  />
        <button type="submit" id="submit" title="Notify Me!">Notify Me!</button>
      </div>
    </form>
    
    <!-- Form success notifications  -->
    <aside>
      <div id="sending-message" class="status-message">
        <p>Adding your email. Please wait...</p>
      </div>

      <div id="success-message" class="status-message">
          <p>Thanks for signing up! We'll get back to you shortly.</p>
        </div>

        <div id="failure-message" class="status-message">
          <p>There was a problem with adding your email. Please try again.</p>
        </div>

        <div id="incomplete-message" class="status-message">
          <p>Please complete all the fields in the form before sending.</p>
        </div>

        <div id="invalid-email" class="status-message">
          <p>Please enter a valid email</p>
        </div>
    </aside>
    
  </section>
  
  <footer>
    <!-- Replace # symbols with the url's to your social networks -->
    <section class="connections">
      <ul class="networks">
        <li class="facebook"><a href="http://www.facebook.com/pages/36Stories/209135269123195">Facebook</a></li>
        <li class="twitter"><a href="http://www.twitter.com/36Stories">Twitter</a></li>
        <!--
        <li class="linkedin"><a href="#">LinkedIn</a></li>
        <li class="flickr"><a href="#">Flickr</a></li>
        <li class="tumblr"><a href="#">Tumblr</a></li>
        -->
      </ul>
    </section>  
  </footer>
  
</div>


<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<!-- jQuery Plugins -->

<?=HTML::script('js/libs/plugins/jquery.pngFix.js')?>
<?=HTML::script('js/libs/plugins/jquery.countdown.js')?>
<?=HTML::script('js/libs/plugins/jquery.defaultvalue.js')?>
<!-- Uncomment for live css preview while developing

<script src="_/js/libs/less-1.0.41.min.js"></script>
<script type="text/javascript" charset="utf-8">
    less.env = "development";
    less.watch();
</script> 
-->


<!-- Main page functions file. Add your custom javascript in this file -->
<?=HTML::script('js/functions.js')?>

<!-- Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23931857-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  
</body>
</html>
