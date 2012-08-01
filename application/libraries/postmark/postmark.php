<?php namespace PostMark;	
	/**
	 * This is a simple library for sending emails with Postmark created by Matthew Loberg (http://mloberg.com)
	 */	
	class PostMark {
	
		private $api_key;
		private $data = array();
		
		function __construct($apikey, $from, $bcc=False){
			$this->api_key = $apikey;
			$this->data["From"] = $from;
			$this->data["Bcc"] = $bcc;
		}

        function replyto($reply) {
            $this->data['ReplyTo'] = $reply;
            return $this; 
        }
		
		function send(){
			$headers = array(
				"Accept: application/json",
				"Content-Type: application/json",
				"X-Postmark-Server-Token: {$this->api_key}"
			);
			$data = $this->data;
			$ch = curl_init('http://api.postmarkapp.com/email');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$return = curl_exec($ch);
			$curl_error = curl_error($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			// do some checking to make sure it sent
			if($http_code !== 200){
				return false;
			}else{
				return true;
			}
		}
		
		function to($to){
			$this->data["To"] = $to;
			return $this;
		}

        function cc($cc) {
			$this->data["Cc"] = $cc;
			return $this;  
        }

        function bcc($bcc) {
            if($this->data["Bcc"]) {
                $this->data["Bcc"] .= $bcc;
            } else {
        	    $this->data["Bcc"] = $bcc;        
            }
		
			return $this;  
        }
		
		function subject($subject){
			$this->data["subject"] = $subject;
			return $this;
		}
		
		function html_message($body){
			$this->data["HtmlBody"] = "<html><body>{$body}</body></html>";
			return $this;
		}
		
		function plain_message($msg){
			$this->data["TextBody"] = $msg;
			return $this;
		}
		
		function tag($tag){
			$this->data["Tag"] = $tag;
			return $this;
		}
	
	}
