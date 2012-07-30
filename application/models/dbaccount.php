<?php

class DBAccount extends S36DataObject {

    public $dbh, $user_id;

    public function __construct() { 
        $this->dbh = DB::connection('master')->pdo;

        if (S36Auth::check()) {
            $this->user_id = S36Auth::user()->userid;             
        } 
    }

    public function create_account() {
        
        $encrypt = new Encryption\Encryption;
        $password_string = "stuarttan668";
        $password = crypt($password_string);
        $name = $this->escape("stuart");
        $email = $this->escape("stuarttan@gmail.com");
        $encrypt_string = $encrypt->encrypt($email."|".$password_string);
        $company = $this->escape(strtolower("stuarttan"));
        $bill_to = "Stuart Tan, LLC";
        $fullName = $this->escape("Stuart Tan");
        $site = $this->escape("www.stuarttan.com");
        $site_name = $this->escape(strtolower("stuarttan"));
        
        if($this->company($company)) {
            throw new Exception("The company $company already exists.");
        } else {  
            print_r("Creating New Account<br/>");
            $this->dbh->beginTransaction();
            $this->dbh->query('INSERT INTO Company (`name`, `planid`, `billTo`) VALUES("'.$company.'", 1, "'.$bill_to.'")');
            $this->dbh->query('SET @company_id = LAST_INSERT_ID()');
            $this->dbh->query('INSERT INTO Metric (`companyId`, `totalRequest`, `totalResponse`) VALUES(@company_id, 0, 0)'); 
            $this->dbh->query('INSERT INTO Site (`companyId`, `domain`, `name`, `defaultFormId`) VALUES(@company_id, "'.$site.'", "'.$site_name.'", 1)');   
            $this->dbh->query('SET @site_id = LAST_INSERT_ID()');
            $this->dbh->query('INSERT INTO User (`companyId`, `username`, `account_owner`,`confirmed`, `password`, `encryptString`, `email`, `fullName`, `title`, `imId`)  
                               VALUES (@company_id, "'.$name.'", 1, 1, "'.$password.'", "'.$encrypt_string.'", "'.$email.'", "'.$fullName.'", "CEO", 1)');
            $this->dbh->query('SET @user_id = LAST_INSERT_ID()');
            $this->dbh->query('INSERT INTO AuthAssignment (`itemname`, `userid`) VALUES ("Admin", @user_id)');
            $this->dbh->query('INSERT INTO Category (`companyId`, `intName`, `name`, `changeable`) 
                               VALUES
                                  (@company_id, "default", "Inbox", 0) 
                                , (@company_id, "general", "General", 1)
                                , (@company_id, "misc", "Miscelleanous", 1)
                                , (@company_id, "price", "Price", 1)
                                , (@company_id, "bugs", "Problems/Bugs", 1)
                                , (@company_id, "suggestions", "Suggestions", 1)');
            $this->dbh->commit();
            
            $company_info = $this->company($company);
            $site_id = $company_info->siteid;
            $company_id = $company_info->companyid;

            $form = new Widget\Entities\FormWidget;
            $form->make_default = True;

            $form_data = (object) Array(
                'widgetkey'   => False
              , 'widget_type' => 'submit'
              , 'site_id'     => $site_id 
              , 'company_id' => $company_id
              , 'theme_type' => 'form-aglow'
              , 'theme_name' => "$company Default"
              , 'embed_type' => 'form'
              , 'submit_form_text'     => 'Please gives us your feedback'
              , 'submit_form_question' => 'What are your thoughts about our product/services?'
              , 'tab_pos'  => 'side'
              , 'tab_type' => 'tab-l-aglow'
            );

            $form->set_widgetdata($form_data);
            $form->save();
            print_r("SUCCESSFUL");
        }

    }

    public function company($company) {
        $sql = "
            select  
                Company.companyId
              , Site.siteId
            from 
                Company 
            inner join
                Site
                    on Site.companyId = Company.companyId
            where 1=1
                and Company.name = :company_name
        ";
        $sth = $this->dbh->prepare($sql);
        $sth->bindparam(':company_name', $company);
        $sth->execute(); 
        $result = $sth->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function companies_wo_defaultwidgets() {
        $sql = "
            SELECT 
            * 
            FROM 
                Company
            INNER JOIN
                Site 
                    ON Site.companyId = Company.companyId
        ";
        $sth = $this->dbh->prepare($sql); 
        $sth->execute(); 
        $result = $sth->fetchAll(PDO::FETCH_CLASS);
        return $result; 
    }

    public function activate_defaultwidgets() {
        $accounts = $this->companies_wo_defaultwidgets();
        foreach($accounts as $account) {
            
            $form = new Widget\Entities\FormWidget;
            $form->make_default = True;

            $form_data = (object) Array(
                'widgetkey'   => False
              , 'widget_type' => 'submit'
              , 'site_id'     => $account->siteid 
              , 'company_id' => $account->companyid
              , 'theme_type' => 'form-aglow'
              , 'theme_name' => "$account->name Default"
              , 'embed_type' => 'form'
              , 'submit_form_text'     => 'Please gives us your feedback'
              , 'submit_form_question' => 'What are your thoughts about our product/services?'
              , 'tab_pos'  => 'side'
              , 'tab_type' => 'tab-l-aglow'
            );
           
            $form->set_widgetdata($form_data);
            //Helpers::dump($form);
            $form->save();
        }

    }
}
