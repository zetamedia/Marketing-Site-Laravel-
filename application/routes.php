<?php

	/*
	 |------------------------------------------------------------------------
	 | Load chargify library
	 |------------------------------------------------------------------------
	  Package::load('chargify');*/
 
return array(

	/*
	|--------------------------------------------------------------------------
	| Application Routes
	|--------------------------------------------------------------------------
	|
	| Here is the public API of your application. To add functionality to your
	| application, you just add to the array located in this file.
	|
	| Simply tell Laravel the HTTP verbs and request URIs it should respond to.
	| You may respond to the GET, POST, PUT, or DELETE verbs. Enjoy the simplicity
	| and elegance of RESTful routing.
	|
	| Here is how to respond to a simple GET request to http://example.com/hello:
	|
	|		'GET /hello' => function()
	|		{
	|			return 'Hello World!';
	|		}
	|
	| You can even respond to more than one URI:
	|
	|		'GET /hello, GET /world' => function()
	|		{
	|			return 'Hello World!';
	|		}
	|
	| It's easy to allow URI wildcards using the (:num) or (:any) place-holders:
	|
	|		'GET /hello/(:any)' => function($name)
	|		{
	|			return "Welcome, $name.";
	|		}
	|
	*/
	
	/*----------------
		Home Page
	*/
	'GET /' => function()
	{
		$title = "Welcome | 36Stories";
		return View::of_layout()->partial('contents', 'home.index',array('title'=>$title));
	},
	
	/*----------------
		Tour Page
	*/
	'GET /tour' => function()
	{
		$title = "Tour | 36Stories";
		return View::of_layout()->partial('contents', 'home.tour',array('title'=>$title));
	},
	
	/*----------------
		Pricing
	*/
	'GET /pricing' => function()
	{
		$title = "Pricing | 36Stories";
		return View::of_layout()->partial('contents', 'home.pricing',array('title'=>$title));
	},
	
	/*----------------
		Company Page
	*/
	'GET /company' => function()
	{
		$title = "Company | 36Stories";
		return View::of_layout()->partial('contents', 'home.company',array('title'=>$title));
	},
	
	/*----------------
		Terms and Conditions
	*/
	'GET /tac' => function()
	{
		$title = "Terms and Conditions | 36Stories";
		return View::of_layout()->partial('contents', 'home.tac',array('title'=>$title));
	},
	
	/*----------------
		Privacy Policy
	*/
	'GET /privacy' => function()
	{
		$title = "Privacy | 36Stories";
		return View::of_layout()->partial('contents', 'home.privacy',array('title'=>$title));
	},
	
	/*----------------
		Login Page
	*/
	'GET /login' => function()
	{
		$title = "Login | 36Stories";
		return View::of_layout()->partial('contents', 'home.login',array('title'=>$title));
	},
	
	/*----------------
		Registration Page
	*/
	'GET /registration/(:any)' => function($plan)
	{
		$creditcard = true;
		$title = "Registration | 36Stories";	
		return View::of_layout()->partial('contents', 'home.registration'
			, array( 'creditcard' => $creditcard 
					,'plan' => $plan,'title'=>$title)
		);
	},
	
	'POST /registration/create_account' => array('needs' => 'chargify', 'do' => function($plan) {	
		$input = Input::get();
        print_r($input);
        /*
		$title = "Registration | 36Stories";
	    $test = true;
		$input = Input::get();
		$chargify = new ChargifyModel($input);
		$chargify->customer = new ChargifyCustomer(NULL, $test);
		$chargify->creditcard = new ChargifyCreditCard(NULL, $test);
		$chargify->subscription = new ChargifySubscription(NULL, $test);

		$dbaccount = new DBAccount;

		echo "<pre>";
		print_r($chargify->process_subscription());
		print_r($dbaccount);
		echo "</pre>";
        */
 
        //$daccount->create_account();
		/*		
		if(!$plan){
			$plan = $input['plan'];
		}
		
		$creditcard = $input['creditcard'];
		
		return View::of_layout()->partial('contents', 'home.registration'
			, array( 'creditcard' => $creditcard 
					,'plan' => $plan)
		);
		*/		
	}),
	
	/*----------------
		Testing
	*/
	'GET /testmodel' => function(){
		$title = "Welcome | 36Stories";
		$user = new UserAccount;	
		print_r($user->get_user());		
	}

);
