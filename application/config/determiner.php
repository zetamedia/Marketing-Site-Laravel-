<?php

class Determiner {

   public $http_host;

   public function __construct() {
       $this->http_host = $_SERVER['SERVER_NAME'];
       $this->d = $this->_host();
   }

   public function _host() {

       $obj = new StdClass; 
 
       //Master STAGING
       if($this->http_host == 'marketing.gearfish.com') {
           $obj->host = 'http://marketing.gearfish.com';
           $obj->db   = 'localhost';
           return $obj;
       }

       //Mathew STAGING
       if($this->http_host == 'mathew-marketing.gearfish.com') {
           $obj->host = 'http://mathew-marketing.gearfish.com';
           $obj->db   = 'localhost';
           return $obj;
       }

       //Kennwel STAGING
       if($this->http_host == 'kennwel-marketing.gearfish.com') {
           $obj->host = 'http://kennwel-marketing.gearfish.com';
           $obj->db   = 'localhost';
           return $obj;
       }

       //PRODUCTION
       if($this->http_host == '36stories.com' || $this->http_host == 'www.36stories.com' || $this->http_host == 'beta.36stories.com') {
           $obj->host = 'http://36stories.com';
           $obj->db   = 'localhost';
           return $obj;
       }

       //PRODUCTION
       /*
       $pattern = '#([a-z]+\.|https?:\/\/){1}[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}(\S*)#i';
       preg_match_all($pattern, $this->http_host, $matches, PREG_PATTERN_ORDER);  
       if($matches[0]) {
           $obj->host = 'http://app.36stories.com';
           $obj->db   = 'prod-db1.c7lrkmoeb1l2.us-west-1.rds.amazonaws.com';
           return $obj;
       }
       */       
   }

}
