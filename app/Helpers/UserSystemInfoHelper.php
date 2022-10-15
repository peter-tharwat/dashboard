<?php
namespace App\Helpers;
use Stevebauman\Location\Facades\Location;

class UserSystemInfoHelper
{


 

    public $countries = [
    "SA" =>'السعودية',"ET" =>'إثيوبيا',"AZ" =>'أذربيجان',"AM" =>'أرمينيا',"AW" =>'أروبا',"ER" =>'إريتريا',"ES" =>'أسبانيا',"AU" =>'أستراليا',"EE" =>'إستونيا',"IL" =>'فلسطين',"AF" =>'أفغانستان',"IO" =>'إقليم المحيط الهندي البريطاني',"EC" =>'إكوادور',"AR" =>'الأرجنتين',"JO" =>'الأردن',"AE" =>'الإمارات',"AL" =>'ألبانيا',"BR" =>'البرازيل',"PT" =>'البرتغال',"BA" =>'البوسنة والهرسك',"GA" =>'الجابون',"DZ" =>'الجزائر',"DK" =>'الدانمارك',"CV" =>'الرأس الأخضر',"PS" =>'فلسطين',"SV" =>'السلفادور',"SN" =>'السنغال',"SD" =>'السودان',"SE" =>'السويد',"SO" =>'الصومال',"CN" =>'الصين',"IQ" =>'العراق',"PH" =>'الفلبين',"CM" =>'الكاميرون',"CG" =>'الكونغو',"CD" =>'الكونغو (جمهورية الكونغو الديمقراطية)',"KW" =>'الكويت',"DE" =>'ألمانيا',"HU" =>'المجر',"MA" =>'المغرب',"MX" =>'المكسيك',"UK" =>'المملكة المتحدة',"TF" =>'المناطق الفرنسية الجنوبية ومناطق انتراكتيكا',"NO" =>'النرويج',"AT" =>'النمسا',"NE" =>'النيجر',"IN" =>'الهند',"US" =>'الولايات المتحدة',"JP" =>'اليابان',"YE" =>'اليمن',"GR" =>'اليونان',"AQ" =>'أنتاركتيكا',"AG" =>'أنتيغوا وبربودا',"AD" =>'أندورا',"ID" =>'إندونيسيا',"AO" =>'أنغولا',"AI" =>'أنغويلا',"UY" =>'أوروجواي',"UZ" =>'أوزبكستان',"UG" =>'أوغندا',"UA" =>'أوكرانيا',"IR" =>'إيران',"IE" =>'أيرلندا',"IS" =>'أيسلندا',"IT" =>'إيطاليا',"PG" =>'بابوا-غينيا الجديدة',"PY" =>'باراجواي',"BB" =>'باربادوس',"PK" =>'باكستان',"PW" =>'بالاو',"BM" =>'برمودا',"BN" =>'بروناي',"BE" =>'بلجيكا',"BG" =>'بلغاريا',"BD" =>'بنجلاديش',"PA" =>'بنما',"BJ" =>'بنين',"BT" =>'بوتان',"BW" =>'بوتسوانا',"PR" =>'بورتو ريكو',"BF" =>'بوركينا فاسو',"BI" =>'بوروندي',"PL" =>'بولندا',"BO" =>'بوليفيا',"PF" =>'بولينزيا الفرنسية',"PE" =>'بيرو',"BY" =>'بيلاروس',"BZ" =>'بيليز',"TH" =>'تايلاند',"TW" =>'تايوان',"TM" =>'تركمانستان',"TR" =>'تركيا',"TT" =>'ترينيداد وتوباجو',"TD" =>'تشاد',"CL" =>'تشيلي',"TZ" =>'تنزانيا',"TG" =>'توجو',"TV" =>'توفالو',"TK" =>'توكيلاو',"TO" =>'تونجا',"TN" =>'تونس',"TP" =>'تيمور الشرقية (تيمور الشرقية)',"JM" =>'جامايكا',"GM" =>'جامبيا',"GI" =>'جبل طارق',"GL" =>'جرينلاند',"AN" =>'جزر الأنتيل الهولندية',"PN" =>'جزر البتكارين',"BS" =>'جزر البهاما',"VG" =>'جزر العذراء البريطانية',"VI" =>'جزر العذراء، الولايات المتحدة',"KM" =>'جزر القمر',"CC" =>'جزر الكوكوس (كيلين)',"MV" =>'جزر المالديف',"TC" =>'جزر تركس وكايكوس',"AS" =>'جزر ساموا الأمريكية',"SB" =>'جزر سولومون',"FO" =>'جزر فايرو',"UM" =>'جزر فرعية تابعة للولايات المتحدة',"FK" =>'جزر فوكلاند (أيزلاس مالفيناس)',"FJ" =>'جزر فيجي',"KY" =>'جزر كايمان',"CK" =>'جزر كوك',"MH" =>'جزر مارشال',"MP" =>'جزر ماريانا الشمالية',"CX" =>'جزيرة الكريسماس',"BV" =>'جزيرة بوفيه',"IM" =>'جزيرة مان',"NF" =>'جزيرة نورفوك',"HM" =>'جزيرة هيرد وجزر ماكدونالد',"CF" =>'جمهورية أفريقيا الوسطى',"CZ" =>'جمهورية التشيك',"DO" =>'جمهورية الدومينيكان',"ZA" =>'جنوب أفريقيا',"GT" =>'جواتيمالا',"GP" =>'جواديلوب',"GU" =>'جوام',"GE" =>'جورجيا',"GS" =>'جورجيا الجنوبية وجزر ساندويتش الجنوبية',"GY" =>'جيانا',"GF" =>'جيانا الفرنسية',"DJ" =>'جيبوتي',"JE" =>'جيرسي',"GG" =>'جيرنزي',"VA" =>'دولة الفاتيكان',"DM" =>'دومينيكا',"RW" =>'رواندا',"RU" =>'روسيا',"RO" =>'رومانيا',"RE" =>'ريونيون',"ZM" =>'زامبيا',"ZW" =>'زيمبابوي',"WS" =>'ساموا',"SM" =>'سان مارينو',"PM" =>'سانت بيير وميكولون',"VC" =>'سانت فينسنت وجرينادينز',"KN" =>'سانت كيتس ونيفيس',"LC" =>'سانت لوشيا',"SH" =>'سانت هيلينا',"ST" =>'ساوتوماي وبرينسيبا',"SJ" =>'سفالبارد وجان ماين',"SK" =>'سلوفاكيا',"SI" =>'سلوفينيا',"SG" =>'سنغافورة',"SZ" =>'سوازيلاند',"SY" =>'سوريا',"SR" =>'سورينام',"CH" =>'سويسرا',"SL" =>'سيراليون',"LK" =>'سيريلانكا',"SC" =>'سيشل',"RS" =>'صربيا',"TJ" =>'طاجيكستان',"OM" =>'عمان',"GH" =>'غانا',"GD" =>'غرينادا',"GN" =>'غينيا',"GQ" =>'غينيا الاستوائية',"GW" =>'غينيا بيساو',"VU" =>'فانواتو',"FR" =>'فرنسا',"VE" =>'فنزويلا',"FI" =>'فنلندا',"VN" =>'فيتنام',"CY" =>'قبرص',"QA" =>'قطر',"KG" =>'قيرقيزستان',"KZ" =>'كازاخستان',"NC" =>'كاليدونيا الجديدة',"KH" =>'كامبوديا',"HR" =>'كرواتيا',"CA" =>'كندا',"CU" =>'كوبا',"CI" =>'كوت ديفوار (ساحل العاج)',"KR" =>'كوريا',"KP" =>'كوريا الشمالية',"CR" =>'كوستاريكا',"CO" =>'كولومبيا',"KI" =>'كيريباتي',"KE" =>'كينيا',"LV" =>'لاتفيا',"LA" =>'لاوس',"LB" =>'لبنان',"LI" =>'لختنشتاين',"LU" =>'لوكسمبورج',"LY" =>'ليبيا',"LR" =>'ليبيريا',"LT" =>'ليتوانيا',"LS" =>'ليسوتو',"MQ" =>'مارتينيك',"MO" =>'ماكاو',"FM" =>'ماكرونيزيا',"MW" =>'مالاوي',"MT" =>'مالطا',"ML" =>'مالي',"MY" =>'ماليزيا',"YT" =>'مايوت',"MG" =>'مدغشقر',"EG" =>'مصر',"MK" =>'مقدونيا، جمهورية يوغوسلافيا السابقة',"BH" =>'البحرين',"MN" =>'منغوليا',"MR" =>'موريتانيا',"MU" =>'موريشيوس',"MZ" =>'موزمبيق',"MD" =>'مولدوفا',"MC" =>'موناكو',"MS" =>'مونتسيرات',"ME" =>'مونتينيغرو',"MM" =>'ميانمار',"NA" =>'ناميبيا',"NR" =>'ناورو',"NP" =>'نيبال',"NG" =>'نيجيريا',"NI" =>'نيكاراجوا',"NU" =>'نيوا',"NZ" =>'نيوزيلندا',"HT" =>'هايتي',"HN" =>'هندوراس',"NL" =>'هولندا',"HK" =>'هونغ كونغ SAR',"WF" =>'واليس وفوتونا',"GB" =>'المملكة المتحدة'
    ];

    public function get_country_from_ip($ip)
    { 
        try{ 
            $location = Location::get($ip);
            $country=$this->countries[$location->countryCode]; 
            return [
                'country'=>$country,
                'country_code'=>$location->countryCode
            ]; 
        }catch(\Exception $e){ }           
        return [
            'country'=>"غير محدد",
            'country_code'=>"404"
        ];
   
    }


    public static function get_user_agent(){
        
  		return request()->header('User-Agent');
  	}

  	public static function get_ip(){
        $ipaddress = '';
        if(isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
            $ipaddress=$_SERVER["HTTP_CF_CONNECTING_IP"];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress=$_SERVER['REMOTE_ADDR'];
        else if(isset($_SERVER['HTTP_CLIENT_IP']))
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
        else if(request()->ip()!=null)
            $ipaddress = request()->ip();
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

  		if(preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower(request()->header('User-Agent')))){
  			$tablet_browser++;
  		}

  		if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower(request()->header('User-Agent')))){
  			$mobile_browser++;
  		}

  		if((isset($_SERVER['HTTP_ACCEPT'])&&strpos(strtolower($_SERVER['HTTP_ACCEPT']),
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
    public static function prev_url(){
        $prev_url="";
        if(filter_var(url()->previous(), FILTER_VALIDATE_URL)) // is a valid url 
        { 
            $parsex= parse_url(url()->previous());
            $prev_domain=$parsex['host'];  
            try{
                $prev_url= url()->previous();
            }catch(\Exception $e){}   
        }
        return $prev_url;
    }
}