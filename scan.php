<?php

$s3url = "https://";

// Output the directory listing as JSON

header('Content-type: application/json');

// Run the recursive function
//$raw_xml = file_get_contents($s3);
$response = scan($s3url, '/');

function scan($s3, $folder='/')
{
  $files = array();
  //Caching
  if(defined('RAW_XML')) {
    $raw_xml = RAW_XML;
  } else {
    $raw_xml = file_get_contents($s3);
    define('RAW_XML', $raw_xml);
  }
  $xml = (array)simplexml_load_string($raw_xml);

  $f_exp_path = explode("/", $folder);

  foreach($xml['Contents'] as $f_obj) {
    $exp_path = explode("/", $f_obj->Key);
    if(substr($f_obj->Key, 0, strlen($folder)-1) == substr($folder, 1, strlen($folder)-1)) {
      if(empty($exp_path[count($exp_path)-1]) && (count($f_exp_path) == count($exp_path))) {
        //Dir
        // Отрезаем последний /
        $result_path = substr($f_obj->Key, 0, strlen($f_obj->Key)-1);
        $files[] = array(
					"name" => $exp_path[count($exp_path)-2],
					"type" => "folder",
					"path" => "files/".(string)$result_path,
					"items" => scan($s3, '/'.$f_obj->Key) // Recursively get the contents of the folder
				);
      } else if(count($f_exp_path)-1 == count($exp_path) && !empty($exp_path[count($exp_path)-1])) {
        //File
        $files[] = array(
					"name" => $exp_path[count($exp_path)-1],
					"type" => "file",
					"path" => $s3."/".(string)$f_obj->Key,
					"size" => (integer)$f_obj->Size // Gets the size of this file
				);
      }
    }
  }
  return $files;
}

echo json_encode(array(
	"name" => "files",
	"type" => "folder",
	"path" => "files",
	"items" => $response
));
?>
