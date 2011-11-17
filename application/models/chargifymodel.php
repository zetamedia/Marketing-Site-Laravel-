<?php
	class ChargifyModel {
		
		private $post_data;
		private $plan_dict = Array('free' => 'free-trial', 'basic' => 'basic-plan', 'enhanced' => 'enhanced-plan', 'premium' => 'premium');
		public $customer, $creditcard, $subscription;
		
		public function __construct($post_data){
			$this->post_data = $post_data;	
		}
		
		private function _get_chargify_plan() {
			if(array_key_exists($this->post_data['plan'], $this->plan_dict)) {
				 return $this->plan_dict[$this->post_data['plan']];
			} 
		}
		
		private function _set_customer_info() {
            $this->customer->email = $this->post_data['email'];//"jane@smith.com";
            $this->customer->first_name = $this->post_data['firstname'];//"Jane";
            $this->customer->last_name = $this->post_data['lastname'];//"Smith";
			$this->customer->organization = $this->post_data['company'];//"Smith";
			return $this->customer;
		}
		
		private function _set_credit_card_info($test='1') {
			$this->creditcard->first_name = $this->post_data['billingfirstname'];
			$this->creditcard->last_name = $this->post_data['billinglastname'];
			// 1 is used in test mode for a vald credit card.
			$this->creditcard->full_number = $test;
			$this->creditcard->cvv = $this->post_data['cvv'];
			$this->creditcard->expiration_month = $this->post_data['expirymonth'];
			$this->creditcard->expiration_year = $this->post_data['expiryyear'];
			$this->creditcard->billing_address = $this->post_data['billingaddress1'];
			$this->creditcard->billing_city = $this->post_data['billingcity'];
			$this->creditcard->billing_state = $this->post_data['billingstate'];
			$this->creditcard->billing_zip = $this->post_data['billingzip'];
			$this->creditcard->billing_country = $this->post_data['billingcountry'];
			return $this->creditcard;
		}
		
		public function process_subscription() {
			$this->subscription->customer_attributes = $this->_set_customer_info();//$this->customer;
			$this->subscription->credit_card_attributes = $this->_set_credit_card_info();//$this->creditcard;
			$this->subscription->product_handle = $this->_get_chargify_plan();
			try {
			  $new_subscription = $this->subscription->create();
			  echo '<pre>';
			  print_r($new_subscription);
			  echo '</pre>';
			} catch (ChargifyValidationException $cve) {
			  // Error handling code.
			  echo $cve->getMessage();
			}
		}
	}