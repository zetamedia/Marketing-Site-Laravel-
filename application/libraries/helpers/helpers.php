<?php namespace Helpers;

use Request, View, DB, Config;

class Helpers {

    private static $request;
    private static $regex;

    //TODO: From zeh database this should be Helpers Class managing too many things at once
    public static $tab_themes = Array(
            'aglow'=>'Aglow'
          , 'silver'=>'Silver'
          , 'chrome'=>'Chrome'
          , 'classic'=>'Classic'
          , 'dark' => 'Dark'
          , 'dark-heart' => 'Dark Heart'
          , 'dark-like' => 'Dark Like'
          , 'alum'   => 'Aluminum'
          , 'alum-heart' => 'Aluminum Heart'
          , 'alum-like' => 'Aluminum Like'
          , 'contrast' => 'Contrast'
          , 'contrast-heart' => 'Contrast Heart'
          , 'contrast-like' => 'Contrast Like'
          , 'matte'  => 'Matte' 
          , 'matte-heart'  => 'Matte Heart'
          , 'matte-like'  => 'Matte Like'
          , 'silver-gray'=>'Silver Gray'
          , 'pencil'  => 'Pencil' 
          , 'pencil-heart'  => 'Pencil Heart'
          , 'pencil-like'  => 'Pencil Like'
    );

    public static function request() {
        return Request::uri();
    }
    
    //TODO: Refactor
    public static function switchable($element, $id, $catid, $hrefaction, $background) { 
        echo "state='".(($element) == 0 ? 0 : 1)."'";
        echo "catid='".$catid."'";
        echo "feedid='".$id."'";
        echo ($element == 0) ? null : $background;
        echo " hrefaction='".$hrefaction."'";
    }

    //TODO: generalize this
    public static function filter_highlighter($urls, $type=False) {

        $request = self::request();

        $filter = function($url) use ($type, $request) {
            $url_match = $url . (($type) ? '/'.$type : null);
            $regex_match = '~^'.$url_match.'$~';
            return preg_match($regex_match, $request, $matches);   
        };
        
        if(is_array($urls)) { 
            return array_filter($urls, $filter);
        } 

        return call_user_func($filter, $urls);     
    }

    public static function nav_switcher() { 
        self::$regex = self::nav_regex();

        if(self::$regex->inbox) {
            return Array('inbox/all', 'inbox/positive', 'inbox/negative', 'inbox/neutral', 'inbox/profanity', 'inbox/flagged', 'inbox/mostcontent');
        }

        $the_navs = Array('published', /*'featured',*/ 'filed');

        foreach($the_navs as $nav) {    
            if(self::$regex->{$nav}) { 
                if($nav == 'published') { 
                    return Array('inbox/'.$nav.'/all',  'inbox/'.$nav.'/profanity', 'inbox/'.$nav.'/flagged', 'inbox/'.$nav.'/mostcontent');
                } else { 
                    return Array('inbox/'.$nav.'/all', 'inbox/'.$nav.'/positive', 'inbox/'.$nav.'/negative', 'inbox/'.$nav.'/neutral', 
                                 'inbox/'.$nav.'/profanity', 'inbox/'.$nav.'/flagged', 'inbox/'.$nav.'/mostcontent');
                }
            }
        }


    }

    public static function nav_regex() { 

        self::$request = self::request();

        return (object)Array( 
            'dashboard' => preg_match_all('/dashboard/', self::$request, $matches), 
            'deleted'   => preg_match_all('/deleted/', self::$request, $matches),
            'inbox'     => preg_match_all('/inbox\/(all|profanity|flagged|mostcontent|positive|negative|neutral|[0-9]+)/', self::$request, $matches),
            'published' => preg_match_all('/published\/(all|profanity|flagged|mostcontent|positive|negative|neutral|[0-9]+)/', self::$request, $matches),
            'featured'  => preg_match_all('/featured\/(all|profanity|flagged|mostcontent|positive|negative|neutral|[0-9]+)/', self::$request, $matches),
            'filed'     => preg_match_all('/filed\/(all|profanity|flagged|mostcontent|positive|negative|neutral|[0-9]+)/', self::$request, $matches),
            'feedsetup' => preg_match_all('/(feedsetup|displaysetup|displaypreview)/', self::$request, $matches),
            'contacts'  => preg_match_all('/contacts|contacts\/(important|request)/', self::$request, $matches),
            'admin'     => preg_match_all('/admin/', self::$request, $matches),
        );
    }

    public static function inbox_state($filter) {

        if($filter == "published") {
            return "publish";          
        }

        if($filter == "featured") {
            return "feature";          
        } 

        if($filter == "filed") {
            return "fileas";
        }

        if($filter == "all") {
           return "inbox";
        }

    }
    
    //retained for legacy shit
    public static function show_data($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    
    //wrapper
    public static function dump($data) {
        return self::show_data($data);
    }


    public static function limit_string($string, $limit = 100) {
        // Return early if the string is already shorter than the limit
        if(strlen($string) < $limit) {return $string;}

        $regex = "/(.{1,$limit})\b/";
        preg_match($regex, $string, $matches);
        return $matches[1]."...";
    }

    public static function render_iframe_code($frame_url, $width, $height) { 
        $iframe = "<span style='z-index:100001'>
                    <iframe id='s36Widget' 
                            allowTransparency='true' 
                            width={$width}
                            height={$height}
                            frameborder='0' 
                            scrolling='no' 
                            src='$frame_url'>Your Widget</iframe>
                    </span>";
         return trim($iframe);
    }

    public static function tab_position_css_output() { 	
        $positions = Array();
        
        $widget = new \Widget\Repositories\DBWidgetThemes;         
        $widget->build_menu_structure();  
        $widget->build_tab_themes();

        foreach(Array('r', 'l', 'br', 'bl', 'tr', 'tl') as $v) {
            $positions[$v] = $widget->perform()->tab_themes; 
        }
        
        return View::make('partials/tab_position_css_output', Array(
            'positions' => $positions, 'url' => Config::get('application.deploy_env')
        ));
    }

    public static function sanitize($string) {
        $page = preg_replace('/[^-a-zA-Z0-9_]/', '', $string);
        return $page;
    }

    public static function tab_position($tab_type) {
        $match = null;  
        if ( preg_match('~tab-(br|bl|tr|tl)~', $tab_type, $match) ) {
            return 'corner';
        } else {
            if( preg_match('~(heart|like)~', $tab_type, $match) ) {
                return 'small-side';     
            } 
            return 'side';     
        } 
    }

    public static function wrap($object) {
        $obj = base64_encode( serialize($object) );
        return $obj;  
    }

    public static function unwrap($object) {
        $obj = unserialize( base64_decode($object) );
        return $obj; 
    }

    public static function make_forward_url($company_id, $forward_url) { 
        $company = DB::Table('Company', 'master')->where('companyId', '=', $company_id)->first(array('name'));
        $host_url = strtolower($company->name).'.'.Config::get('application.hostname').'.com';
        $login_url = trim("http://".$host_url."/login?forward_to=".$forward_url);
        return $login_url;
    }

    public static function html_cleaner($url) {
        $U = explode(' ', $url);
         
        foreach ($U as $k => $u) {
            if (stristr($u,".")) { //only preg_match if there is a dot    
                if (self::contains_tld($u) === true) {
                    unset($U[$k]);
                    return self::html_cleaner(implode(' ',$U));
                }      
            }
        }
        return implode(' ',$U);
    }

    public static function relative_time($time, $short=False) {
        $SECOND = 1;
        $MINUTE = 60 * $SECOND;
        $HOUR = 60 * $MINUTE;
        $DAY = 24 * $HOUR;
        $MONTH = 30 * $DAY;
        $before = time() - $time;

        if ($before < 0) {
            return "not yet";
        }

        if ($short) {
            if ($before < 1 * $MINUTE) {
                return ($before <5) ? "just now" : $before . " ago";
            }

            if ($before < 2 * $MINUTE) {
                return "1m ago";
            }

            if ($before < 45 * $MINUTE) {
                return floor($before / 60) . "m ago";
            }

            if ($before < 90 * $MINUTE) {
                return "1h ago";
            }

            if ($before < 24 * $HOUR) {
                return floor($before / 60 / 60). "h ago";
            }

            if ($before < 48 * $HOUR) {
                return "1d ago";
            }

            if ($before < 30 * $DAY) {
                return floor($before / 60 / 60 / 24) . "d ago";
            }


            if ($before < 12 * $MONTH) {
                $months = floor($before / 60 / 60 / 24 / 30);
                return $months <= 1 ? "1mo ago" : $months . "mo ago";
            } else {
                $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
                return $years <= 1 ? "1y ago" : $years."y ago";
            }
        }

        if ($before < 1 * $MINUTE) {
            return ($before <= 1) ? "just now" : $before . " seconds ago";
        }

        if ($before < 2 * $MINUTE) {
            return "a minute ago";
        }

        if ($before < 45 * $MINUTE) {
            return floor($before / 60) . " minutes ago";
        }

        if ($before < 90 * $MINUTE) {
            return "an hour ago";
        }

        if ($before < 24 * $HOUR) {

            return (floor($before / 60 / 60) == 1 ? 'about an hour' : floor($before / 60 / 60).' hours'). " ago";
        }

        if ($before < 48 * $HOUR) {
            return "yesterday";
        }

        if ($before < 30 * $DAY) {
            return floor($before / 60 / 60 / 24) . " days ago";
        }

        if ($before < 12 * $MONTH) {
            $months = floor($before / 60 / 60 / 24 / 30);
            return $months <= 1 ? "one month ago" : $months . " months ago";
        } else {
            $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
            return $years <= 1 ? "one year ago" : $years." years ago";
        }

        return $time;       
    }

    public static function contains_tld($string) {
        preg_match(
            "~(AC($|\/)|\.AD($|\/)|\.AE($|\/)|\.AERO($|\/)|\.AF($|\/)|\.AG($|\/)|\.AI($|\/)|\.AL($|\/)|\.AM($|\/)|\.AN($|\/)|\.AO($|\/)|\.AQ($|\/)|\.AR($|\/)|\.ARPA($|\/)|\.AS($|\/)|\.ASIA($|\/)|\.AT($|\/)|\.AU($|\/)|\.AW($|\/)|\.AX($|\/)|\.AZ($|\/)|\.BA($|\/)|\.BB($|\/)|\.BD($|\/)|\.BE($|\/)|\.BF($|\/)|\.BG($|\/)|\.BH($|\/)|\.BI($|\/)|\.BIZ($|\/)|\.BJ($|\/)|\.BM($|\/)|\.BN($|\/)|\.BO($|\/)|\.BR($|\/)|\.BS($|\/)|\.BT($|\/)|\.BV($|\/)|\.BW($|\/)|\.BY($|\/)|\.BZ($|\/)|\.CA($|\/)|\.CAT($|\/)|\.CC($|\/)|\.CD($|\/)|\.CF($|\/)|\.CG($|\/)|\.CH($|\/)|\.CI($|\/)|\.CK($|\/)|\.CL($|\/)|\.CM($|\/)|\.CN($|\/)|\.CO($|\/)|\.COM($|\/)|\.COOP($|\/)|\.CR($|\/)|\.CU($|\/)|\.CV($|\/)|\.CX($|\/)|\.CY($|\/)|\.CZ($|\/)|\.DE($|\/)|\.DJ($|\/)|\.DK($|\/)|\.DM($|\/)|\.DO($|\/)|\.DZ($|\/)|\.EC($|\/)|\.EDU($|\/)|\.EE($|\/)|\.EG($|\/)|\.ER($|\/)|\.ES($|\/)|\.ET($|\/)|\.EU($|\/)|\.FI($|\/)|\.FJ($|\/)|\.FK($|\/)|\.FM($|\/)|\.FO($|\/)|\.FR($|\/)|\.GA($|\/)|\.GB($|\/)|\.GD($|\/)|\.GE($|\/)|\.GF($|\/)|\.GG($|\/)|\.GH($|\/)|\.GI($|\/)|\.GL($|\/)|\.GM($|\/)|\.GN($|\/)|\.GOV($|\/)|\.GP($|\/)|\.GQ($|\/)|\.GR($|\/)|\.GS($|\/)|\.GT($|\/)|\.GU($|\/)|\.GW($|\/)|\.GY($|\/)|\.HK($|\/)|\.HM($|\/)|\.HN($|\/)|\.HR($|\/)|\.HT($|\/)|\.HU($|\/)|\.ID($|\/)|\.IE($|\/)|\.IL($|\/)|\.IM($|\/)|\.IN($|\/)|\.INFO($|\/)|\.INT($|\/)|\.IO($|\/)|\.IQ($|\/)|\.IR($|\/)|\.IS($|\/)|\.IT($|\/)|\.JE($|\/)|\.JM($|\/)|\.JO($|\/)|\.JOBS($|\/)|\.JP($|\/)|\.KE($|\/)|\.KG($|\/)|\.KH($|\/)|\.KI($|\/)|\.KM($|\/)|\.KN($|\/)|\.KP($|\/)|\.KR($|\/)|\.KW($|\/)|\.KY($|\/)|\.KZ($|\/)|\.LA($|\/)|\.LB($|\/)|\.LC($|\/)|\.LI($|\/)|\.LK($|\/)|\.LR($|\/)|\.LS($|\/)|\.LT($|\/)|\.LU($|\/)|\.LV($|\/)|\.LY($|\/)|\.MA($|\/)|\.MC($|\/)|\.MD($|\/)|\.ME($|\/)|\.MG($|\/)|\.MH($|\/)|\.MIL($|\/)|\.MK($|\/)|\.ML($|\/)|\.MM($|\/)|\.MN($|\/)|\.MO($|\/)|\.MOBI($|\/)|\.MP($|\/)|\.MQ($|\/)|\.MR($|\/)|\.MS($|\/)|\.MT($|\/)|\.MU($|\/)|\.MUSEUM($|\/)|\.MV($|\/)|\.MW($|\/)|\.MX($|\/)|\.MY($|\/)|\.MZ($|\/)|\.NA($|\/)|\.NAME($|\/)|\.NC($|\/)|\.NE($|\/)|\.NET($|\/)|\.NF($|\/)|\.NG($|\/)|\.NI($|\/)|\.NL($|\/)|\.NO($|\/)|\.NP($|\/)|\.NR($|\/)|\.NU($|\/)|\.NZ($|\/)|\.OM($|\/)|\.ORG($|\/)|\.PA($|\/)|\.PE($|\/)|\.PF($|\/)|\.PG($|\/)|\.PH($|\/)|\.PK($|\/)|\.PL($|\/)|\.PM($|\/)|\.PN($|\/)|\.PR($|\/)|\.PRO($|\/)|\.PS($|\/)|\.PT($|\/)|\.PW($|\/)|\.PY($|\/)|\.QA($|\/)|\.RE($|\/)|\.RO($|\/)|\.RS($|\/)|\.RU($|\/)|\.RW($|\/)|\.SA($|\/)|\.SB($|\/)|\.SC($|\/)|\.SD($|\/)|\.SE($|\/)|\.SG($|\/)|\.SH($|\/)|\.SI($|\/)|\.SJ($|\/)|\.SK($|\/)|\.SL($|\/)|\.SM($|\/)|\.SN($|\/)|\.SO($|\/)|\.SR($|\/)|\.ST($|\/)|\.SU($|\/)|\.SV($|\/)|\.SY($|\/)|\.SZ($|\/)|\.TC($|\/)|\.TD($|\/)|\.TEL($|\/)|\.TF($|\/)|\.TG($|\/)|\.TH($|\/)|\.TJ($|\/)|\.TK($|\/)|\.TL($|\/)|\.TM($|\/)|\.TN($|\/)|\.TO($|\/)|\.TP($|\/)|\.TR($|\/)|\.TRAVEL($|\/)|\.TT($|\/)|\.TV($|\/)|\.TW($|\/)|\.TZ($|\/)|\.UA($|\/)|\.UG($|\/)|\.UK($|\/)|\.US($|\/)|\.UY($|\/)|\.UZ($|\/)|\.VA($|\/)|\.VC($|\/)|\.VE($|\/)|\.VG($|\/)|\.VI($|\/)|\.VN($|\/)|\.VU($|\/)|\.WF($|\/)|\.WS($|\/)|\.XN--0ZWM56D($|\/)|\.XN--11B5BS3A9AJ6G($|\/)|\.XN--80AKHBYKNJ4F($|\/)|\.XN--9T4B11YI5A($|\/)|\.XN--DEBA0AD($|\/)|\.XN--G6W251D($|\/)|\.XN--HGBK6AJ7F53BBA($|\/)|\.XN--HLCJ6AYA9ESC7A($|\/)|\.XN--JXALPDLP($|\/)|\.XN--KGBECHTV($|\/)|\.XN--ZCKZAH($|\/)|\.YE($|\/)|\.YT($|\/)|\.YU($|\/)|\.ZA($|\/)|\.ZM($|\/)|\.ZW)~i",
            $string,
            $M);

        $has_tld = (count($M) > 0) ? true : false;
        return $has_tld;
    }
}
