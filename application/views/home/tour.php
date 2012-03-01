<script type="text/javascript">
$(document).ready(function(){
	var tour_contents = $('#container').cycle({
							fx:'scrollVert', 
							speed:500, 
							timeout:0 ,
							pause : 1,
							easing: 'easeInOutExpo',
							before: onAfter
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
<div class="splitter">
  <div class="inner-split"></div>
</div>
<div class="shadow">
  <div class="inner-shadow">
    <div class="white-arrow-down"></div>
  </div>
</div>
<!-- end of division --> 
<!-- start content -->
<div id="mainbodywrapper">
  <div id="mainbodycontent">
    <div id="tour-box">
      <div id="tour-leftbar">
        <div class="bar">
          <div class="bar-head">
            <h2>36 Stories Tour Page</h2>
          </div>
          <div class="bar-body">
            <ul id="menu-list">
              <li id="1" class="selected">
                <div class="the-arrow-right"></div>
                <ul class="bar-ico-bubble">
                  <h3>Powerful Feedback Control</h3>
                  <li>Publish, feature or file away feedback with a click of a button</li>
                  <!--
                  <li>Feature endorsements that truly matter.</li>
                  <li>File negative feedback away or send it to someone else.</li>
                  <li>Respond instantly to feedback</li>
                  <li>Permission based endorsements</li>
                  -->
                </ul>
              </li>
              <li id="2">
                <div class="the-arrow-right"></div>
                <ul class="bar-ico-pie">
                  <h3>Complete Feedback Analytics</h3>
                  <li>Powerful insight at a glance, and understand where your customers are facing problems in your website or business</li>
                  <!--
                  <li>Get strategic feedback where it matters most.</li>
                  -->
                </ul>
              </li>
              <li id="3">
                <div class="the-arrow-right"></div>
                <ul class="bar-ico-mail">
                  <h3>Get Viral On The Social Web</h3>
                  <li>Market your business through word of mouth and via social media</li>
                  <!--
                  <li>Word of mouth marketing - on steroids.</li>
                  <li>Authentic Profiles.</li>
                  <li>Show them all off in style</li>
                  -->
                </ul>
              </li>
              <li id="4">
                <div class="the-arrow-right"></div>
                <ul class="bar-ico-folder">
                  <h3>Seamless Integration with your website</h3>
                  <li>Plug and play feedback forms with over 30 dynamic templates</li>
                  <!--
                  <li>Plug and play feedback forms</li>
                  <li>Personalized and courtesy follow ups</li>
                  <li>Over 30 dynamic templates to choose from</li>
                  -->
                </ul>
              </li>
              <li id="5">
                <div class="the-arrow-right"></div>
                <ul class="bar-ico-thumb">
                  <h3>Features to help your business grow</h3>
                  <li>Designed to be simple to use, cost-effective and scalable, discover how we help your business grow hassle-free</li>
                  <!--
                  <li>Powerful contact manager</li>
                  <li>Built to scale with your business.</li>
                  <li>Export your data anytime</li>
                  <li>No long term contracts - pay as you go</li>
                  <li>Your data is secure and safe</li>
                  -->
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
              <h1>Powerful Feedback Control</h1>
              <!-- <p>Publish and share positive customer experiences at a click. Fast forward negative feedback to your customer support representative.</p> --> 
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text">
              <h2>Publish powerful endorsements to your website with a single click</h2>
              <p>Instantly publish a positive feedback into a testimonial that displays throughout your site with a single click. </p>
              <p>Our simple, intuitive admin panel is an absolute breeze to use – it allows you or an assigned team member to easily work through feedback to publish endorsements or to file away feedback. There's no complicated menus, no convoluted processes, no complex permissions. No HTML codes or images to worry about either. </p>
              <p>Review your feedback and just click Publish. </p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage11.png')?>
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage12.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Feature endorsements that truly matter</h2>
              <p>Got a recommendation from that big time CEO or a Magazine? Feature them in a prominent position on your website or arrange them in a specific order if you want.</p>
              <p>You can feature specific endorsements or quotes in a single-feedback unit, or show a whole page. It's all possible with our wide array of themes.</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <h2 style="color:#1D3F61">File negative feedback away or send it to someone else.</h2>
            <div class="subinfo-text left" style="width:255px">
              <p>File away negative feedback into configurable categories to follow up on them later. You can create new categories that suit your business. Whether it's a pricing issue or a technical problem, you can always refer to it quickly and easily later.</p>
              <?=HTML::image('img/toursubimage13.png')?>
              <br class="clear" />
            </div>
            <div class="subinfo-text left" style="width:275px;padding-left:45px;">
              <p>Our Fast Forward options allow you to send feedback quickly to someone else within your company. For example – if you have a customer asking for his shipping status through our feedback prompt, you can forward it to your shipping department for rapid follow up.</p>
              <?=HTML::image('img/toursubimage14.png')?>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage15.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Respond instantly to feedback</h2>
              <p>Save time by responding instantly to feedback without ever having to open your email client.</p>
              <p>Thank your users instantly with configurable automatic replies, preset templates and close the feedback loop, fostering a closer relationship with your customers.</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info last">
            <div class="subinfo-text">
              <h2>Permission based endorsements</h2>
              <p>It's only polite to ask for complete consent and not to publish feedback without your user's permission. 36Stories has a permission based system where you get the green light from your customers to use their feedback before you even see it in your inbox. You'll have the relief of publishing endorsements public, knowing that your customers have already given their 'okay'.</p>
              <p>We also help you ask for complete permission to use their quotes in your other marketing materials (e.g. brochures). Use quotes that make the biggest impact for your business, or use the entire endorsement in its entirety. </p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage16.png')?>
            </div>
            <br class="clear" />
          </div>
          <br class="clear" />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
        </div>
        <!-- slide 2 -->
        <div class="container-box">
          <div class="main-title">
            <div class="main-title-image">
              <?=HTML::image('img/ico-small-pie.png')?>
              <br class="clear" />
            </div>
            <div class="main-title-text">
              <h1>Complete Feedback Analytics</h1>
              <!-- <p>Have a simplified yet detailed insight into your customer satisfaction ratings, geographic profiles and pain points in your business.</p> --> 
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text" style="width:252px">
              <h2>Powerful insight at a glance</h2>
              <p>What do your visitors and returning customers feel and want? With 36Stories, you get your answers quick. </p>
              <p>Discover whether your product is overpriced, or not as feature-rich as your competitors. Are people having a problem with your site speed? Why are potential customers abandoning your shopping cart? Get out of the dark with rapid feedback with our insight dashboard.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image " style="width:355px;min-height:80px;margin-right:-30px;">
              <?=HTML::image('img/toursubimage21.png')?>
              <br class="clear" />
            </div>
            <br class="clear" />
            <div>
              <div class="subinfo-image left" style="width:405px;min-height:80px;margin-left:-10px;">
                <?=HTML::image('img/toursubimage22.png')?>
              </div>
              <div class="subinfo-text" style="width:172px">
                <p>Fix problematic areas in your business or improve your processes. Have a simplified yet detailed insight into your customer satisfaction ratings, geographic profiles and pain points in your business. </p>
                <br class="clear" />
              </div>
              <br class="clear" />
            </div>
            <p style="text-align:center;font-size:12px;font-weight:bold;margin-right:-10px;">You can even find out which pages get the most amount of feedback and why in our insight dashboard.</p>
            <br />
          </div>
          <div class="sub-info last">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage23.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Get strategic feedback where it matters most</h2>
              <p>Place customized forms into your site at specific locations to gather feedback you want.</p>
              <p>Want to collect info from your customers who have just purchased from you? Place a feedback capture form in the checkout pages to rate their buying and checkout experience.</p>
              <p>Discover whether you're pricing your products or services too high…. or a little too low? Put a 'Feedback about this price' form in your product page to get accurate and quick inputs from the most valued people in your business - your customers.</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <br class="clear" />
        </div>
        <!-- slide 3 -->
        <div class="container-box">
          <div class="main-title">
            <div class="main-title-image">
              <?=HTML::image('img/ico-small-mail.png')?>
              <br class="clear" />
            </div>
            <div class="main-title-text">
              <h1>Get Viral On The Social Web</h1>
              <!--<p>It simply means fewer forms to fill and a easier and faster way to give your business a powerful and authentic review.</p> --> 
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text">
              <h2>Word of mouth marketing - on steroids</h2>
              <p>It's not enough just having your endorsements listed on your website. Get people talking about your business and brand out there by being on your customer's social profiles such as Facebook and Twitter.</p>
              <p>Every time you publish an endorsement sent by your customer via your admin panel, 36Stories sends an automated response to encourage him or her share their feedback on their favorite social networks. Freeing your brand to be spread even further through your customers' friends.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage31.png')?>
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage44.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Social sharing</h2>
              <p>Let your endorsements go viral with integrated social media links. 36Stories makes it easier for others to agree and share the same experience they've had with your brand.</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text" style="width:300px;paddingright:15px;">
              <h2>Build trust with authentic profiles</h2>
              <p>Your customers can easily attach their personal profiles that include their current company, titles and profession to their feedback with Facebook Connect.</p>
              <p>It simply means fewer forms to fill and an easier and faster way to give your business and brand a powerful and authentic endorsement.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage46.png')?>
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info last">            
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage33.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Show them all off in style</h2>
              <p>There's nothing like showing your visitors your entire collection of endorsements, whether it's 50 or a hundred thousand. You can display every single one of them when visitors select 'View all'. Click ours for an example.</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <br class="clear" />
        </div>
        <!-- slide 4 -->
        <div class="container-box">
          <div class="main-title">
            <div class="main-title-image">
              <?=HTML::image('img/tourmainimage4.png')?>
              <br class="clear" />
            </div>
            <div class="main-title-text">
              <h1>Dozens of Awesome Templates</h1>
              <!-- <p>There's nothing like showing your visitors your entire collection of endorsements, whether it's 50 or a hundred thousand. You can display every single one of them when visitors select 'View all'. Click ours for an example.</p> --> 
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text">
              <h2>Plug and play feedback forms</h2>
              <p>With an easy to use and implement generation wizard, you can quickly capture visitor and customer feedback with plug and play forms, custom links and tabs all into your site. </p>
              <p>And if you prefer - you can decide how and the best way to retrieve feedback for your business/service using your own language, designs and style.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right" style="margin-top:-10px;">
              <?=HTML::image('img/toursubimage41.png')?>
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage42.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Personalized and courtesy follow ups</h2>
              <p>Our built-in response systems allow you to get even closer and strengthen your relationships with your customers. Use preset templates to communicating with your users, whether it is to thank them, or send them a personalized appreciation message (or even a discount coupon).</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text left" style="width:255px">
              <h2>Over 30 dynamic templates to choose from</h2>
              <p>Choose and select over 30 different design themes and styles to suit your website. From simple quotes to fancy profile setups, our team of designers is consistently adding to our theme and style database each week - so you don't have to worry about running out of ideas.</p>
              <p>If you don't want to show your customers last names, we've got that covered - you can easily configure each theme to hide fields that you don't want to display to the public.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right"style="width:275px">
              <?=HTML::image('img/toursubimage43.png')?>
            </div>
            <br class="clear" />
          </div>
          
          <div class="sub-info">
            <div class="subinfo-image left" style="width:405px;">
              <?=HTML::image('img/toursubimage45.png')?>
            </div>
            
            <div class="subinfo-text" style="width:172px">
              <h2>Show them all off</h2>
              <p>Our plug-and-play themes allow your visitors to view hundreds, or even thousands of endorsements every single day. Visitors can scroll through feedback that's left daily on your website, increasing brand goodwill and trust.</p>
              <br class="clear" />
            </div>
            
            <br class="clear" />
          </div>
          <div class="sub-info last">
            <div class="subinfo-text" style="width:255px;">
              <h2>Easy to integrate</h2>
              <p>Start using 36Stories on your website within minutes with a wide variety of great-looking tabs and links.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right" style="width:275px;">
              <?=HTML::image('img/toursubimage47.png')?>
            </div>
            <br class="clear" />
          </div>
          <br class="clear" />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          
        </div>
        
        <!-- content 5 -->
        <div class="container-box">
          <div class="main-title">
            <div class="main-title-image">
              <?=HTML::image('img/tourmainimage5.png')?>
              <br class="clear" />
            </div>
            <div class="main-title-text">
              <h1 style="width:700px;font-size:32px;">Features to help your business grow</h1>
              <!-- <p>Your data is yours. Never ours. Export it anytime you wish. </p> --> 
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text">
              <h2>Powerful contact manager</h2>
              <p>Follow up customers with our in-built contact manager that imports, emails and manages follow-up feedback and endorsements from your database without you having to do the hard work. Have an immediate overview on who has replied to your requests and feature experiences from happy customers, all with their given permission.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage51.png')?>
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage52.png')?>
            </div>
            <div class="subinfo-text">
              <h2>Built to scale with your business</h2>
              <p>Whether you're a one-man (or woman) army, or a Fortune 500 enterprise with a thousand over employees, 36Stories allows two or more co-admins to easily access and manage feedback without fuss and confusion. </p>
              <p>It also integrates easily within your customer relationship processes to improve user satisfaction, sales and brand reputation.</p>
              <br class="clear" />
            </div>
            <br class="clear" />
          </div>
          <div class="sub-info">
            <div class="subinfo-text">
              <h2>Export your data anytime</h2>
              <p>Your data is yours - never ours. Export it anytime you wish. You can download them via excel, CSV format or have it sent to your email. You don't need to pay a cent to us to release it back to you either.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage53.png')?>
            </div>
            <br class="clear" />
          </div>
          <br class="clear" />
          <div class="sub-info">
            <div class="subinfo-image left">
              <?=HTML::image('img/toursubimage54.png')?>
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
              <p>Our state-of-the-art computer servers are protected by biometric locks and 24-hour surveillance. Our product software and infrastructure is updated regularly with the latest security patches. Our network is protected by an enterprise-class firewall and all subscription plans include SSL encryption to keep your data safe.</p>
              <br class="clear" />
            </div>
            <div class="subinfo-image right">
              <?=HTML::image('img/toursubimage55.png')?>
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