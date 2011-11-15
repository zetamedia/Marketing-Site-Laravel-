<script type="text/javascript">
$(document).ready(function(){
	var tour_contents = $('#container').cycle({
							fx:      'scrollVert', 
							speed:    500, 
							timeout:  0 ,
							pause : 1,
							easing: 'easeInOutExpo'
						});
	$('ul#menu-list').children().each(function(i){			

			$(this).click(function(){

				$('ul#menu-list').children().each(function(i){
						//remove the selected class from the list
						$(this).removeClass();

					});
				//add the selected class to list that is clicked
				$(this).addClass('selected');
				//assign the list id to a variable
				var slideno = $(this).attr('id');
				
				slideno = parseInt(slideno - 1);
				//go to the cycle
				tour_contents.cycle(i);

			});

		});

	});
function onAfter(curr, next, opts, fwd) {
	var index = opts.currSlide;
	$('#prev')[index == 0 ? 'hide' : 'show']();
	$('#next')[index == opts.slideCount - 1 ? 'hide' : 'show']();
	//get the height of the current slide
	var $ht = $(this).height();
	//set the container's height to that of the current slide
	$(this).parent().animate({"height":$ht},'fast');
}	
</script>
<!-- start title of page -->
<div id="titlebarwrapper">
	<div id="subtitlebarwrapper">
    	<div id="titlebarcontent">
        	<h1>Let your brand get better, faster than ever before.</h1>
            <p>See why 36Stories works so well for our customers worldwide.</p>
        </div>
    </div>
</div>
<!-- end title of page -->
<!-- division -->
<div class="splitter"><div class="inner-split"></div></div>
<div class="shadow"><div class="inner-shadow"><div class="white-arrow-down"></div></div></div>
<!-- end of division -->
<!-- start content -->
<div id="mainbodywrapper">
	<div id="mainbodycontent">
    	<div id="tour-box">
            <div id="tour-leftbar">
				<div class="bar">
                	<div class="bar-head"><h2>36 Stories Tour Page</h2></div>
                    <div class="bar-body">
                    	<ul id="menu-list">
                        	<li id="1" class="selected"><div class="the-arrow-right"></div>
                            	<ul class="bar-ico-bubble">
                                	<h3>Powerful Feedback Control</h3>
                                	<li>Intuitive, simple and 1-click features allows you to get your endorsements published instantly or hidden seamlessly. Strengthen your relationships with your clients and close the feedback loop with your most important customers - with complete ease.</li>
                                    
                                </ul>
                            </li>
                            <li id="2"><div class="the-arrow-right"></div>
                            	<ul class="bar-ico-pie">
                                	<h3>Complete Feedback Analytics</h3>
                                	<li>Our easy to understand metrics allows you to quickly discover weak spots and pain points in your website at a glance and resolve problems rapidly. Allowing you to easily improve areas in your business where it counts the most.</li>
                                </ul>
                            </li>
                            <li id="3"><div class="the-arrow-right"></div>
                            	<ul class="bar-ico-mail">
                                	<h3>Get Viral On The Social Web.</h3>
                                	<li>Push authentic endorsements and testimonials instantly across the social web. Get your business featured and talked about on your customer's Facebook and Twitter profiles every day.</li>
                                </ul>
                            </li>
                            <li id="4"><div class="the-arrow-right"></div>
                            	<ul class="bar-ico-folder">
                                	<h3>Dozens of Templates</h3>
                                	<li>Get over 30 different types of templates available to suit your website and style, with customizable feedback forms to integrate our services seamlessly into your website.</li>
                                </ul>
                            </li>
                            <li id="5"><div class="the-arrow-right"></div>
                            	<ul class="bar-ico-thumb">
                                	<h3>Just the tip of the iceberg</h3>
                                	<li>36Stories is built to scale with your business. Your data is always yours, so export your customer information anytime or let us store it safely in our 24/7/365 vaults. No long term contracts either  - pay as you go, and more.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="bar-foot"></div>
                </div>	                
            </div>
            <div id="container">
            
            	<div class="container-box">
                	<div class="main-title">
                    	<div class="main-title-image">
                        	<?=HTML::image('img/tour-main-image1.png')?>
                            <br class="clear" />
                        </div>
                        <div class="main-title-text">
							<h1>Complete and rapid control</h1>
                            <p>Publish and share positive customer experiences at a click. Fast forward negative feedback to your customer support representative.</p>
                            <br class="clear" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Real feedback. Powerful customer testimonials. In mere milliseconds.</h2>
                            <p>Instantly convert a positive feedback into a testimonial that displays throughout your site with a single click.  Got a recommendation from that big time CEO or a Magazine? Feature them in a prominent position on your website or arrange them in a specific order if you want.</p>
							<p>Let your visitors and potential customers are read relevant customer positive experiences on a daily basis, increasing and cementing their buying confidence in your site and products.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<?=HTML::image('img/subinfo-image-1.png')?>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<?=HTML::image('img/toursubimage2.jpg')?>
                        </div>
                        <div class="subinfo-text">
                        	<h2>Easy to use features.</h2>
                            <p>Simple, intuitive and an absolute breeze to use – our backend allows you or an assigned team member to easily work through feedback to publish or file away feedback. There's no complicated menus, no convoluted processes, no complex permissions.</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>You have complete control.</h2>
                            <p>Publish and share positive customer experiences at a click. Fast forward negative feedback to your customer support representative for rapid follow-up and closure. Nothing ever gets out of hand without your permission.  No spam either.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<?=HTML::image('img/toursubimage3.jpg')?>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<?=HTML::image('img/toursubimage4.jpg')?>
                        </div>
                        <div class="subinfo-text">
                        	<h2>Immediate feedback dialogue</h2>
                            <p>Respond instantly to any feedback the moment your visitors send feedback in without ever having to open your email client. Thank your users instantly with automatic replies, preset templates and close the feedback loop, fostering a closer relationship with your customers.</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info last">
                        <div class="subinfo-text">
                        	<h2>Content Management System.</h2>
                            <p>It's only polite to ask for complete consent and never to publish feedback without your user's permission.  We've built a permission based system where you get the green light from your customers before you even see it in your inbox. 
							<p>We also help you ask for complete permission to use their quotes in your other marketing materials. Use quotes that make the most impact for your business, or use the entire quote. </p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<?=HTML::image('img/toursubimage5.jpg')?>
                        </div>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
                <div class="container-box">
                	<div class="main-title">
                    	<div class="main-title-image">
                        	<?=HTML::image('img/tourmainimage2.jpg')?>
                            <br class="clear" />
                        </div>
                        <div class="main-title-text">
							<h1>Complete Feedback Analytics</h1>
                            <p>Have a simplified yet detailed insight into your customer satisfaction ratings, geographic profiles and pain points in your business.</p>
                            <br class="clear" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Rapid user feedback that you can act on.</h2>
                            <p>What do your visitors and returning customers feel and want? </p>
							<p>With 36Stories, you get your answers quick. Discover whether your product is overpriced, or not as feature-rich as your competitors. Are people having a problem with your site speed? Why are potential customers abandoning your shopping cart? Get out of the dark with rapid feedback - and act on them to your immediate advantage.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<?=HTML::image('img/toursubimage21.jpg')?>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<?=HTML::image('img/toursubimage22.jpg')?>
                        </div>
                        <div class="subinfo-text">
                        	<h2>Insight dashboard – Get Complete Clarity.</h2>
                            <p>Get important metrics at a quick glance. Discover and fix problematic areas in your business. Have a simplified yet detailed insight into your customer satisfaction ratings, geographic profiles and pain points in your business.</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Strategic and targeted feedback.</h2>
	                            <p>Place customized forms into your site at specific locations to gather feedback you want. </p>
    	                        <p>Want to collect info from your customers who have just purchased from you? Place a feedback capture form in the checkout pages to rate their buying and checkout experience. </p>
        	                    <p>Discover whether you're pricing your products or services too high…. or a little too low? Put a 'Feedback about this price' form in your product page to get accurate and quick inputs from the most valued people in your business - your customers.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<?=HTML::image('img/toursubimage23.jpg')?>
                        </div>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
                <div class="container-box">
                	<div class="main-title">
                    	<div class="main-title-image">
                        	<?=HTML::image('img/tourmainimage3.jpg')?>
                            <br class="clear" />
                        </div>
                        <div class="main-title-text">
							<h1>Social Integrated Marketing</h1>
                            <p>It simply means fewer forms to fill and a easier and faster way to give your business a powerful and authentic review.</p>
                            <br class="clear" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Word of mouth marketing - on steroids.</h2>
                            <p>Customize our inbuilt follow up messages to visitors to send your appreciation, and to share their own feedback with their own friends on Facebook. </p>
							<p>Every appreciation reply for users who have submitted published testimonials are optimized to encourage share their feedback on their favorite social networks, allowing your brand to be powered even further through social proof and personalized customer recommendations.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<?=HTML::image('img/toursubimage31.jpg')?>
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<?=HTML::image('img/toursubimage32.jpg')?>
                        </div>
                        <div class="subinfo-text">
                        	<h2>Seamless Profile Creation</h2>
                            <p>Your customers can easily attach their profiles that include their current company, titles and profession to their feedback with Facebook Connect or they can do so manually. It simply means fewer forms to fill and a easier and faster way to give your business a powerful and authentic review.</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
                <div class="container-box">
                	<div class="main-title">
                    	<div class="main-title-image">
                        	<?=HTML::image('img/tourmainimage4.jpg')?>
                            <br class="clear" />
                        </div>
                        <div class="main-title-text">
							<h1>Dozens of Templates</h1>
                            <p>Use preset templates to communicating with your users, whether it is to thank them, or send them a personalized appreciation message.</p>
                            <br class="clear" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Customizable feedback forms </h2>
                            <p>With an easy to use and implement generation wizard, quickly capture visitor and customer feedback  with plug and play forms, custom links, tabs all into your site. And if you prefer - you can decide how and the best way to retrieve feedback for your business/service using your own language, buttons and style.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<img src="images/subinfo-image-1.png" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<img src="images/toursubimage2.jpg" />
                        </div>
                        <div class="subinfo-text">
                        	<h2>Personalized and courtesy follow ups</h2>
                            <p>Our built-in response systems allow you to get even closer and strengthen your relationships with your customers. Use preset templates to communicating with your users, whether it is to thank them, or send them a personalized appreciation message (or even a discount coupon).</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Over 30 dynamic templates to choose from</h2>
                            <p>Choose and select over 30 different design themes and styles to suit your website. From simple quotes to fancy profile setups, our team of designers is consistently adding to our theme and style database each week - so you don't have to worry about running out of ideas.
							<p>Here are a few samples.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<img src="images/toursubimage4.jpg" />
                        </div>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
                <div class="container-box">
                	<div class="main-title">
                    	<div class="main-title-image">
                        	<img src="images/tourmainimage5.jpg" />
                            <br class="clear" />
                        </div>
                        <div class="main-title-text">
							<h1>More nice stuff</h1>
                            <p>Your data is yours. Never ours. Export it anytime you wish. </p>
                            <br class="clear" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Powerful contact manager</h2>
                            <p>Follow up customers with our in-built contact manager that imports, emails and manages followup feedback and testimonials from your database without you having to do the hard work. Have an immediate overview on who has replied to your requests and feature experiences from happy customers (with their permission!).</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<img src="images/subinfo-image-1.png" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<img src="images/toursubimage2.jpg" />
                        </div>
                        <div class="subinfo-text">
                        	<h2>Built to scale with your business.</h2>
                            <p>Whether you're a one-man (or woman) army, or a Fortune 500 enterprise with a thousand over employees, 36Stories allows two or more co-admins to easily access and manage feedback without fuss and confusion. It also integrates easily within your customer relationship processes to improve user satisfaction, sales and brand reputation.</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                        <div class="subinfo-text">
                        	<h2>Export your data anytime</h2>
                            <p>Your data is yours. Never ours. Export it anytime you wish. You can download them via excel, csv or have it sent to your email.</p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<img src="images/toursubimage3.jpg" />
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info">
                    	<div class="subinfo-image">
                        	<img src="images/toursubimage4.jpg" />
                        </div>
                        <div class="subinfo-text">
                        	<h2>No long term contracts - pay as you go</h2>
                            <p>We are a pay-as-you go service. There's no long term contracts to tie you down or have you commit to. You just pay month to month. If you cancel, you will just be billed for the current month but won't get billed again.</p>
							<br class="clear" />                       
                        </div>
                        <br class="clear" />
                    </div>
                    <div class="sub-info last">
                        <div class="subinfo-text">
                        	<h2>Your data is secure and safe</h2>
                            <p>Our state-of-the-art computer servers are protected by biometric locks and 24-hour surveillance. Our product software and infrastructure is updated regularly with the latest security patches. Our network is protected by an enterprise-class firewall and all subscription plans include SSL encryption to keep your data safe. </p>
							<br class="clear" />                       
                        </div>
                        <div class="subinfo-image right">
                        	<img src="images/toursubimage5.jpg" />
                        </div>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <br class="clear" />
        </div>
    </div>
</div>
<!-- end of content -->