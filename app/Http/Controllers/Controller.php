<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
//////////////////
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mail;
Carbon::setLocale('ar');
use Storage;
use Intervention\Image\ImageManager;
use Imagick;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function get_validations($type="file"){
        if($type=="file") 
            return "3gp,7z,7zip,ai,apk,avi,bin,bmp,bz2,css,csv,doc,docx,egg,flv,gif,gz,h264,htm,html,ia,icns,ico,jpeg,jpg,m4v,markdown,md,mdb,mkv,mov,mp3,mp4,mpa,mpeg,mpg,mpga,octet-stream,odp,ods,odt,ogg,otf,pak,pdf,pea,png,pps,ppt,pptx,psd,rar,rm,rss,rtf,s7z,sql,svg,tar,targz,tbz2,tex,tgz,tif,tiff,tlz,ttf,vob,wav,webm,wma,wmv,xhtml,xlr,xls,xlsx,xml,z,zip,zipx,gif,png,jpeg,qt";
        else if($type=="image")
            return "jpeg,bmp,png,gif";
        else
            return $type;
    }


    /*$this->store_file([
        'source'=>$request->image,
        'validation'=>"image",
        'path_to_save'=>'/uploads/clients/',
        'type'=>'CLIENT', 
        'user_id'=>\Auth::user()->id,
        'resize'=>[500,3000],
        'small_path'=>'small/',
        'visibility'=>'PUBLIC',
        'file_system_type'=>env('FILESYSTEM_DRIVER'),
        'watermark'=>true,
        'compress'=>'auto'
    ])['filename']; 
    $this->use_hub_file($file, $client->id, auth()->user()->id);
    */

    public function store_file($options)
    {   
        $validation=Validator::make($options, [ 'source' => "required|mimes:".$this->get_validations($options["validation"])."|max:250000"]);  if($validation->fails()) {
            $file=$options['source'];
            $filename='';
            return [
                'success' => false, 
                'filename' => $options['source'],

                // for new extension
                "hasWarnings"=>yes,
                "isSuccess"=>false,
                "warnings"=>['لم نتمكن من رفع هذا الملف'],
                "files"=>[
                    [
                        "date"=>date('Y-m-d h:i:s'),
                        "extension"=>$file->extension(),
                        "file"=>$filename,
                        "format"=>"application",
                        "name"=>$filename,
                        "old_name"=>"ملف",
                        "old_title"=>"ملف",
                        "replaced"=>false,
                        "size"=>$file->getSize(),
                        "size2"=>"$file->getSize() KB",
                        "title"=>$filename,
                        "type"=>$file->getMimeType(),
                        "uploaded"=>true
                    ]
                ]

            ];
        }
        $user_id=$options['user_id'];
        $file       = $options["source"];
        $path       = $options["path_to_save"]; // '/uploads/portfolios/';
        $path_small = $options["path_to_save"] . $options["small_path"];
        if (null != $options["resize"]) {
            $filename = $user_id . '_' . uniqid() . '_' . time() . '.jpg';
            
            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $back = $manager->canvas($image->width(), $image->height(), '#ffffff');
            $back->insert($image)->orientate()->fit($image->width(), $image->height())->encode('png', 100);

            $sm_img = \Image::make($back)->resize($options["resize"][0], null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');
            $sm_img->stream();



            $manager2 = new ImageManager(['driver' => 'gd']);
            $image2 = $manager2->make($file);
            $back2 = $manager2->canvas($image2->width(), $image2->height(), '#ffffff');
            $back2->insert($image2)->orientate()->fit($image2->width(), $image2->height())->encode('png', 100);


            $img = \Image::make($back2)->resize($options["resize"][1], null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            /*if(isset($options['watermark']) && $options['watermark']==true)
                $img->insert(public_path('/site_images/logo-water-mark.png'),'bottom-left',20, 20);*/
            $img->stream();


            if(isset($options['compress']) && $options['compress']!="-1"){
                $quality=100;

                if($image2->width()>=3000)
                    $quality=30;
                else if ($image2->width()<3000 && $image2->width()>=2000)
                    $quality=80;
                else if ($image2->width()<2000 && $image2->width()>=1000)
                    $quality=90;

                $imagick = new \Imagick();
                $imagick->readImageBlob($img);
                $imagick->setImageCompressionQuality($quality);
                $img = $imagick->getImageBlob();
            }
            try{
                \Storage::disk($options["file_system_type"])->put('/'.strtolower($options['visibility']) . $path .$path_small . $filename, $sm_img, $filename);
            }catch(\Exception $e){}
            try{
                \Storage::disk($options["file_system_type"])->put('/'.strtolower($options['visibility']) . $path . $filename, $img, $filename);
            }catch(\Exception $e){}

        } else {
            $filename = $user_id . '_' . uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            try{ 
                \Storage::disk($options["file_system_type"])->put('/'.strtolower($options['visibility']) . $path . $filename, \File::get($file), $filename);
            }catch(\Exception $e){}
        }
        $s = \App\Models\HubFile::create(
            [
                'user_id'     => $user_id,
                'path'        => $options["path_to_save"],
                'extension'   => $file->extension(),
                'size'        => $file->getSize(),
                'getMimeType' => $file->getMimeType(),
                'type'        => $options["type"],
                'name'        => $filename,
                'visibility'  => $options["visibility"],
                'bucket_name' => $options["file_system_type"]
            ]
        );
        return [
            'success' => true, 
            'filename' => $filename,

            // for new extension
            "hasWarnings"=>false,
            "isSuccess"=>true,
            "warnings"=>[],
            "files"=>[
                [
                    "date"=>date('Y-m-d h:i:s'),
                    "extension"=>$file->extension(),
                    "file"=>$filename,
                    "format"=>"application",
                    "name"=>$filename,
                    "old_name"=>"ملف",
                    "old_title"=>"ملف",
                    "replaced"=>false,
                    "size"=>$file->getSize(),
                    "size2"=>$file->getSize()." KB",
                    "title"=>$filename,
                    "type"=>$file->getMimeType(),
                    "uploaded"=>true
                ]
            ]
        ];
 
     }
    public function remove_hub_file($name)
    {
        $get_file = \App\Models\HubFile::where('name', $name)->first();
        if (null != $get_file && ( ($get_file['user_id'] == \Auth::user()->id ) ) ) {
            $get_file->delete(); 
            return ['success' => true, 'filename' => $name];
        }

        return ['success' => false, 'filename' => $name];
    }
    public function use_hub_file($name, $type_id, $user_id = null, $is_main = 0)
    {

        $get_file = \App\Models\HubFile::where('name', $name)->first();
        if (null != $get_file && $get_file['user_id'] == $user_id && null == $get_file['used_at']) {
            $get_file->update(['type_id' => $type_id, 'used_at' => now(), 'is_main' => $is_main]);
            return ['success' => true, 'filename' => $name];
        }
        return ['success' => false, 'filename' => $name];
    }
    public static function generate_slug($string){
        $t = $string; 
        $specChars = array(
            ' ' => '-',    '!' => '',    '"' => '',
            '#' => '',    '$' => '',    '%' => '',
            '&amp;' => '','&nbsp;' => '', 
            '\'' => '',   '(' => '',
            ')' => '',    '*' => '',    '+' => '',
            ',' => '',    '₹' => '',    '.' => '',
            '/-' => '',    ':' => '',    ';' => '',
            '<' => '',    '=' => '',    '>' => '',
            '?' => '',    '@' => '',    '[' => '',
            '\\' => '',   ']' => '',    '^' => '',
            '_' => '',    '`' => '',    '{' => '',
            '|' => '',    '}' => '',    '~' => '',
            '-----' => '-',    '----' => '-',    '---' => '-',
            '/' => '',    '--' => '-',   '/_' => '-',    
        ); 
        foreach ($specChars as $k => $v) {
            $t = str_replace($k, $v, $t);
        }
 
        return substr($t,0,230);
    }
    
}