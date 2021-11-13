@php 
$preloadedFiles=array();
foreach($files as $file){ 
	if($file->visibility=="PUBLIC")
		$the_path="https://".$file->bucket_name.".s3.eu-west-3.amazonaws.com". $file->path . $file->name;
	else
		$the_path=env('APP_URL'). $file->path . $file->name;
	$preloadedFiles[] = array(
		"name" => $file->name,
		"type" => $file->getMimeType,
		"size" => $file->size,
		"file" =>  $the_path,
		"local" => $the_path,
	);
}echo json_encode($preloadedFiles);
@endphp