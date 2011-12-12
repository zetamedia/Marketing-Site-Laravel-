<script type="text/javascript">
	
	$(document).ready(function(){
		var password2 	= $('input[name=password2]');
		var password1	= $('input[name=password1]');
		
		password2.blur(function(){
			if((password2.val() != '') && (password1.val().length > 0)){
				check_password();
			}
		});
		
		password1.blur(function(){
			if((password1.val() != '') && (password2.val().length > 0)){
				check_password();
			}
		});
		
	});
	function validate_email(email) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
		return true;
		}else{
		return false;
		}
	}
	
	function check_password(){
		
		var password1 	= $('input[name=password1]');
		var password2 	= $('input[name=password2]');
		password2.parent().find('span.passwordMessage').remove();
		
		if(password1.val().length < 6 || password2.val().length < 6){
			password2.parent().append('<span class="passwordMessage failed">Minimum of 6 characters</span>');
		}else if(password1.val() != password2.val()){
			password2.parent().append('<span class="passwordMessage failed">Password don\'t match!</span>');
		}else{
			password2.parent().append('<span class="passwordMessage success">Password Matched!</span>');
		}
		
	}
	function validate_form(){
		
		var firstname 	= $('input[name=firstname]');
		var lastname 	= $('input[name=lastname]');
		var email 		= $('input[name=email]');
		var company 	= $('input[name=company]');
		var username 	= $('input[name=username]');
		var password1 	= $('input[name=password1]')
		var password2 	= $('input[name=password2]');
		var website 	= $('input[name=website]');
		
		var error = 0;
		
		if((firstname.val().length <= 0) || 
		   (firstname.val() == "Please Enter Your First Name")){
			
			add_error(firstname,'Please Enter Your First Name');
			error = 1;
			
		}
		
		if((lastname.val().length <= 0) || 
		   (lastname.val() == "Please Enter Your Last Name")){
			
			add_error(lastname,'Please Enter Your Last Name');
			error = 1;
			
		}
		
		if((email.val().length <= 0) || 
		   (email.val() == 'Please Enter Your Email')){
			
			add_error(email,'Please Enter Your Email');
			error = 1;
			
		}else if(!validate_email(email.val())){
			
			add_error(email,'Please Enter A Valid Email');
			error = 1;
			
		}
		
		if((company.val().length <= 0) || 
		   (company.val() == "Please Enter Your Company Name")){
			
			add_error(company,'Please Enter Your Company Name');
			error = 1;
			
		}
		
		if((username.val().length <= 0) || 
		   (username.val() == "Please Enter Your Username")){
			
			add_error(username,'Please Enter Your Username');
			error = 1;
			
		}
		
		
		if(password1.val().length <= 0){
			
			add_error(password1,'');
			error = 1;
			
		}
		if(password2.val().length <= 0){
			
			add_error(password2,'');
			error = 1;
			
		}
		
		if((website.val().length <= 0) || 
		   (website.val() == "Enter Your Site Address Here")){
			
			add_error(website,'Enter Your Site Address Here');
			error = 1;
			
		}
		<?php if($creditcard): ?>
		
		
		var billingfirstname = $('input[name=billingfirstname]');
		var billinglastname  = $('input[name=billinglastname]');
		var billingaddress1  = $('input[name=billingaddress1]');
		//var billingaddress2  = $('input[name=billingaddress2]');
		var billingcity		 = $('input[name=billingcity]');
		var billingstate	 = $('input[name=billingstate]');
		var billingcountry	 = $('input[name=billingcountry]');
		var billingzip 		 = $('input[name=billingzip]');
		
		var cardnumber	= $('input[name=cardnumber]');
		var expiryyear 	= $('input[name=expiryyear]');
		var expirymonth	= $('input[name=expirymonth]');
		var cvv			= $('input[name=cvv]');
		
		if((billingfirstname.val().length <= 0) || 
		   (billingfirstname.val() == "Enter Your Billing First Name")){
			
			add_error(billingfirstname,'Enter Your Billing First Name');
			error = 1;
			
		}
		
		if((billinglastname.val().length <= 0) || 
		   (billinglastname.val() == "Enter Your Billing Last Name")){
			
			add_error(billinglastname,'Enter Your Billing Last Name');
			error = 1;
			
		}
		
		if((billingaddress1.val().length <= 0) || 
		   (billingaddress1.val() == "Enter Your Billing Address")){
			
			add_error(billingaddress1,'Enter Your Billing Address');
			error = 1;
			
		}
		
		if((billingcity.val().length <= 0) || 
		   (billingcity.val() == "Enter Your Billing City")){
			
			add_error(billingcity,'Enter Your Billing City');
			error = 1;
			
		}
		
		if((billingstate.val().length <= 0) || 
		   (billingstate.val() == "Enter Your Billing State")){
			
			add_error(billingstate,'Enter Your Billing State');
			error = 1;
			
		}
		
		if((cardnumber.val().length <= 0) || 
		   (cardnumber.val() == "Enter Your Credit Card Number")){
			
			add_error(cardnumber,'Enter Your Credit Card Number');
			error = 1;
			
		}
		
		if(billingzip.val().length <= 0){
			
			add_error(billingzip,'');
			error = 1;
			
		}
		
		if(cvv.val().length <= 0){
			
			add_error(cvv,'');
			error = 1;
			
		}
		<?php endif; ?>
		if(error == 1){
			$('html, body').animate({
				scrollTop: $("#leftcontents").offset().top
			}, 200);
			
			return false;
		}else{
			return true;
		}
		
	}

	function add_error(obj,message){
		
		var error = obj.parent().find('.errorMessage');
		
			if(error.length <= 0){
				obj.val(message);
				obj.addClass('errorInput');
			}
			
		obj.focus(
			function(){
					if(obj.val() == message){
						obj.val('');
						obj.removeClass('errorInput');
					}
			});	
	}
</script>
<!-- start title of page -->
<div id="titlebarwrapper">
	<div id="subtitlebarwrapper">
    	<div id="titlebarcontent">
        	<h1>You're just 60 seconds away from your new account.</h1>
            <p>All plans come with a first 30 days, no risk free trial</p>
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
		<div id="registration">
        	<div id="leftcontents">
            	<div>
					<?php
                    if($plan == "free"){
                        echo HTML::image('img/plan_free.png');
                    }elseif($plan == "basic"){
                        echo HTML::image('img/plan_basic.png');
                    }elseif($plan == "enhanced"){
                        echo HTML::image('img/plan_enhanced.png');
                    }elseif($plan == "premium"){
                        echo HTML::image('img/plan_premium.png');
                    }
                    ?>
                    <br /><br />                        
                </div>
            	<?=Form::open('registration/'.$plan, 'POST', array('onsubmit'=>'return validate_form()'))?>
            	<div class="leftcontentblock">
                	<h2><span>1.</span> Create your <span>36</span>Stories Account</h2>
                    <table>
                    	<tr><td class="label">First Name : </td>
                        	<td>
								<?=Form::text('firstname'
											   , isset($_POST['firstname']) ? $_POST['firstname'] : ''
											   , array('class' => 'reg-text'));
					 			?>
                            </td>
                        </tr>
                        <tr><td class="label">Last Name : </td>
                        	<td>
								<?=Form::text('lastname'
											  , isset($_POST['lastname']) ? $_POST['lastname'] : ''
											  , array('class' => 'reg-text'));
								?>
                            </td>
                        </tr>
                        <tr><td class="label">Email : </td>
                        	<td>
								<?=Form::text('email'
											  , isset($_POST['email']) ? $_POST['email'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Company : </td>
                        	<td>
								<?=Form::text('company'
											  , isset($_POST['company']) ? $_POST['company'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                        <!-- <tr><td class="label">Timezone : </td><td><select class="reg-select"><option>Example</option></select></td></tr> -->
                    </table>
                </div>
                <div class="leftcontentblock">
                	<h2><span>2.</span> Now choose a username and password</h2>
                    <table>
                    	<tr><td class="label">Username : </td>
                        	<td>
								<?=Form::text('username'
											  , isset($_POST['username']) ? $_POST['username'] : ''
											  , array('class' => 'reg-text'));?>
                                              
                                <br /><small>This is what you'll use to sign in.</small>
                            </td>
                        </tr>
                        <tr><td class="label">Password : </td>
                        	<td>
								<?=Form::password('password1',array('class' => 'reg-text'));?><br /><small>6 characters or longer with at least one number is safest.</small>
                            </td>
                        </tr>
                        <tr><td class="label" valign="middle">Confirm Password : </td>
                        	<td>
								<?=Form::password('password2',array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="leftcontentblock">
                	<h2><span>3.</span> Create your <span>36</span>Stories site address</h2>
                    <p>Every EngageBox site has its own web address. For example, if you want <br />your Basecamp site to be at http://acme.36stories.com you'd enter acme <br /> in the field below. Letters and Numbers only.</p>
                    <p><span style="font-size:13px;">http://</span> <?=Form::text('website'
																				  , isset($_POST['website']) ? $_POST['website'] : ''
																				  , array('class' => 'reg-text'));?> .36Stories.com</p>
                </div>
                <?php if($creditcard): ?>
                <div class="leftcontentblock">
                	<h2><span>4.</span> Enter your Billing Information</h2>
                    <table>
                    	<tr><td class="label">First Name : </td>
                        	<td>
								<?=Form::text('billingfirstname'
											  , isset($_POST['billingfirstname']) ? $_POST['billingfirstname'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Last Name : </td>
                        	<td>
								<?=Form::text('billinglastname'
											  , isset($_POST['billinglastname']) ? $_POST['billinglastname'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Billing Address : </td>
                        	<td>
								<?=Form::text('billingaddress1'
											  , isset($_POST['billingaddress1']) ? $_POST['billingaddress1'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Billing Address 2 : </td>
                        	<td>
								<?=Form::text('billingaddress2'
											  , isset($_POST['billingaddress2']) ? $_POST['billingaddress2'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Billing City : </td>
                        	<td>
								<?=Form::text('billingcity'
											  , isset($_POST['billingcity']) ? $_POST['billingcity'] : ''
											  , array('class' => 'reg-text medium'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Billing State : </td>
                        	<td>
								<?=Form::text('billingstate'
											  , isset($_POST['billingstate']) ? $_POST['billingstate'] : ''
											  , array('class' => 'reg-text medium'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Billing Country : </td>
                        	<td>
								<?=Form::select('billingcountry' , array( '01' => 'Philippines', 
																		  '02' => 'United States')
																  , isset($_POST['billingcountry']) ? $_POST['billingcountry'] : '01' 
																  , array('class' => 'reg-select medium'));?>
                            </td>
                        </tr>
                        <tr><td class="label">Billing ZIP : </td>
                        	<td>
								<?=Form::text('billingzip'
											  , isset($_POST['billingzip']) ? $_POST['billingzip'] : ''
											  , array('class' => 'reg-text small'));?>
                             <small>(or Postal Code If not in the USA)</small>
                            </td>
                        </tr>
                        <tr><td class="label">Card Number : </td>
                        	<td>
                                <?=Form::hidden('creditcard',$creditcard)?>
								<?=Form::hidden('plan',$plan)?>
								<?=Form::text('cardnumber'
											  , isset($_POST['cardnumber']) ? $_POST['cardnumber'] : ''
											  , array('class' => 'reg-text'));?>
                            </td>
                            <td valign="middle">
								<strong class="secure-ico">Secure</strong>
                            </td>
                        </tr>
                        <tr><td class="label">Expiry Date : </td><td>
                        
																	<?=Form::select('expirymonth' , array('01' => 'January', 
																										  '02' => 'February', 
																										  '03' => 'March', 
																										  '04' => 'April', 
																										  '05' => 'May', 
																										  '06' => 'June', 
																										  '07' => 'July', 
																										  '08' => 'August', 
																										  '09' => 'September', 
																										  '10' => 'October', 
																										  '11' => 'November', 
																										  '12' => 'December', )
																								  , isset($_POST['expirymonth']) ? $_POST['expirymonth'] : '01' 
																								  , array('class' => 'reg-select medium'));?>
                                                                                                  
																	<?=Form::select('expiryyear'  , array('2008' => '2008', 
																	                              		  '2009' => '2009',
																								  		  '2010' => '2010',
																								  		  '2011' => '2011')
																								  , isset($_POST['expiryyear']) ? $_POST['expiryyear'] : '2008'
																								  , array('class' => 'reg-select small'));?>
                                                                	
                                                                    
                                                                 
                                                                 </td><td><?=HTML::image('img/cards.jpg','Credit Cards')?></td></tr>
                        
                        <tr><td class="label">CVV : </td>
                        	<td>
								<?=Form::text('cvv'
											  , isset($_POST['cvv']) ? $_POST['cvv'] : ''
											  , array('class' => 'reg-text small'));?>
                            </td>
                        </tr>
                    </table>
                    <p class="light-text">
                    	We don't accept POs, checks, or invoices to be paid at a later date.
                        <br />
                        We will email you a receipt each time your card is charged.
                    </p>
                    <p>By clicking Create Account you agree to the <?=HTML::link('/tac', 'Terms and Conditions')?>, <?=HTML::link('/privacy', 'Privacy')?>, and <a href="#">Refund policies</a></p>
                </div>
                <?php endif ?>
                <?=Form::submit('',array('class'=>'create-account-btn'))?>
                <?=Form::close()?>
            </div>
            <div id="rightcontents">
            	<div class="gray-box">
                	<h1>Thank you for choosing 36Stories!</h1>
                    <h3>Your're in good hands <br /> when you use  36Stories.</h3>
                    <h3>Secure and reliable</h3>
                    <p>Our services are being accessed daily by over 100,000 users and growing</p>
                    <h3>Over 100,000 users</h3>
                    <p>Your data is backed up daily</p>
                    <h3>Great customer service</h3>
                    <p>Fast, speedy, and friendly help</p>
                    <br /><br />
                </div>
                <div class="blue-box">
                	<div class="updated-ribbon"></div>
                	<h2>30 Day Free Trial</h2>
                    <p>You won't be billed unless you keep your account past the 30-day free trial.</p>
                    <p>We need your billing information to reduce fraud and verify you have a valid credit card should you keep your account open. This prevents any interruption in service.</p>
                </div>
            </div>
            <br class="clear" />
        </div>
    </div>
</div>
<!-- end of content -->