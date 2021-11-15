<?php

/**
 *
 */
namespace App\Helpers;
class UserSystemInfoHelper
{
  private static function get_user_agent(){
  		return $_SERVER['HTTP_USER_AGENT'];
  	}

  	public static function get_ip(){

      $ipaddress = '';
         if (isset($_SERVER['HTTP_CLIENT_IP']))
             $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
         else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
             $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
         else if(isset($_SERVER['HTTP_X_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
         else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
             $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
         else if(isset($_SERVER['HTTP_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_FORWARDED'];
         else if(isset($_SERVER['REMOTE_ADDR']))
             $ipaddress = $_SERVER['REMOTE_ADDR'];
         else
             $ipaddress = 'UNKNOWN';
         return $ipaddress;

  	}

  	public static function get_os(){

  		$user_agent = self::get_user_agent();
  		$os_platform = "Unknown OS Platform";
  		$os_array = array(
  			'/windows nt 10/i'  => 'Windows 10',
  			'/windows nt 6.3/i'  => 'Windows 8.1',
  			'/windows nt 6.2/i'  => 'Windows 8',
  			'/windows nt 6.1/i'  => 'Windows 7',
  			'/windows nt 6.0/i'  => 'Windows Vista',
  			'/windows nt 5.2/i'  => 'Windows Server 2003/XP x64',
  			'/windows nt 5.1/i'  => 'Windows XP',
  			'/windows xp/i'  => 'Windows XP',
  			'/windows nt 5.0/i'  => 'Windows 2000',
  			'/windows me/i'  => 'Windows ME',
  			'/win98/i'  => 'Windows 98',
  			'/win95/i'  => 'Windows 95',
  			'/win16/i'  => 'Windows 3.11',
  			'/macintosh|mac os x/i' => 'Mac OS X',
  			'/mac_powerpc/i'  => 'Mac OS 9',
  			'/linux/i'  => 'Linux',
  			'/ubuntu/i'  => 'Ubuntu',
  			'/iphone/i'  => 'iPhone',
  			'/ipod/i'  => 'iPod',
  			'/ipad/i'  => 'iPad',
  			'/android/i'  => 'Android',
  			'/blackberry/i'  => 'BlackBerry',
  			'/webos/i'  => 'Mobile',
  		);

  		foreach ($os_array as $regex => $value){
  			if(preg_match($regex, $user_agent)){
  				$os_platform = $value;
  			}
  		}
  		return $os_platform;
  	}

  	public static function get_browsers(){

  		$user_agent= self::get_user_agent();

  		$browser = "Unknown Browser";

  		$browser_array = array(
  			'/msie/i'  => 'Internet Explorer',
  			'/Trident/i'  => 'Internet Explorer',
  			'/firefox/i'  => 'Firefox',
  			'/safari/i'  => 'Safari',
  			'/chrome/i'  => 'Chrome',
  			'/edge/i'  => 'Edge',
  			'/opera/i'  => 'Opera',
  			'/netscape/'  => 'Netscape',
  			'/maxthon/i'  => 'Maxthon',
  			'/knoqueror/i'  => 'Konqueror',
  			'/ubrowser/i'  => 'UC Browser',
  			'/mobile/i'  => 'Safari Browser',
  		);

  		foreach($browser_array as $regex => $value){
  			if(preg_match($regex, $user_agent)){
  				$browser = $value;
  			}
  		}
  		return $browser;
  	}

  	public static function get_device(){

  		$tablet_browser = 0;
  		$mobile_browser = 0;

  		if(preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
  			$tablet_browser++;
  		}

  		if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
  			$mobile_browser++;
  		}

  		if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),
  		'application/vnd.wap.xhtml+xml')> 0) or
  			((isset($_SERVER['HTTP_X_WAP_PROFILE']) or
  				isset($_SERVER['HTTP_PROFILE'])))){
  					$mobile_browser++;
  		}

  			$mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
  			$mobile_agents = array(
  				'w3c','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
  				'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',

  				'newt','noki','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',

  				'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
  				'wapr','webc','winw','winw','xda','xda-');

  				if(in_array($mobile_ua,$mobile_agents)){
  					$mobile_browser++;
  				}

  				if(strpos(strtolower(self::get_user_agent()),'opera mini') > 0){
  					$mobile_browser++;

  					//Check for tables on opera mini alternative headers

  					$stock_ua =
  					strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?
  					$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:
  					(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?
  					$_SERVER['HTTP_DEVICE_STOCK_UA']:''));

  					if(preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)){
  						$tablet_browser++;
  					}
  				}

  				if($tablet_browser > 0){
  					//do something for tablet devices

  					return 'Tablet';
  				}
  				else if($mobile_browser > 0){
  					//do something for mobile devices

  					return 'Mobile';
  				}
  				else{
  					//do something for everything else
  						return 'Computer';
  				}

  	}
}