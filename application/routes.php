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
		return View::of_layout()->partial('contents', 'home.index');
	},
	
	/*----------------
		Tour Page
	*/
	'GET /tour' => function()
	{
		return View::of_layout()->partial('contents', 'home.tour');
	},
	
	/*----------------
		Pricing
	*/
	'GET /pricing' => function()
	{
		return View::of_layout()->partial('contents', 'home.pricing');
	},
	
	/*----------------
		Company Page
	*/
	'GET /company' => function()
	{
		return View::of_layout()->partial('contents', 'home.company');
	},
	
	/*----------------
		Terms and Conditions
	*/
	'GET /tac' => function()
	{
		return View::of_layout()->partial('contents', 'home.tac');
	},
	
	/*----------------
		Privacy Policy
	*/
	'GET /privacy' => function()
	{
		return View::of_layout()->partial('contents', 'home.privacy');
	},
	
	/*----------------
		Login Page
	*/
	'GET /login' => function()
	{
		return View::of_layout()->partial('contents', 'home.login');
	},
	
	/*----------------
		Registration Page
	*/
	'GET /registration/(:any)' => function($plan)
	{
		$creditcard = true;
		
		return View::of_layout()->partial('contents', 'home.registration'
			, array( 'creditcard' => $creditcard 
					,'plan' => $plan)
		);
	},
	
	'POST /registration/(:any)' => array('needs' => 'chargify', function($plan)
	{	
	    $test = true;
		$input = Input::get();
		$chargify = new ChargifyModel($input);
		$chargify->customer = new ChargifyCustomer(NULL, $test);
		$chargify->creditcard = new ChargifyCreditCard(NULL, $test);
		$chargify->subscription = new ChargifySubscription(NULL, $test);
		
		echo "<pre>";
		print_r($chargify->process_subscription());
		echo "</pre>";
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
		
		$user = new UserAccount;
		
		print_r($user->get_user());
		
	}

);