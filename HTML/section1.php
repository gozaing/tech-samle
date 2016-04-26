<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$file = $_FILES['fileToUpload']['name'];

var_dump(@$_FILES['fileToUpload']);
// array (size=5)
//   'name' => string 'sample_3sec_IMG_2521.MOV' (length=24)
//   'type' => string 'video/quicktime' (length=15)
//   'tmp_name' => string '/tmp/phpgO7dJ5' (length=14)
//   'error' => int 0
//   'size' => int 409241
//$file_actual = $_FILES['fileToUpload']['tmp_name'];
//$file_actual = $_FILES['fileToUpload']['tmp_name'];
$file_actual = $file;

echo "<br>file->" . $file;
echo "<br>file_actual->" . $file;
$file_name = $file;

// ticket を取らないといけない
//$apiURL = "https://capi.miovp.com/login?host=demo-001160&userid=admin&password=Qr8tyfCp";
$apiURL = "https://capi.miovp.com/login?host=demo-001160&userid=user&password=86HXTblU";
$content = file_get_contents($apiURL);
$ret = json_decode($content, TRUE);

var_dump($ret);

$ticket = $ret['ticket'];
$login_status = $ret['status'];

echo "ticket->" . $ticket;
echo "<br>login_status->" . $login_status;
echo "<br>getTiecket";


$apiURL = "https://capi.miovp.com/file/upload";
$params = array("ticket" => $ticket);

//動画ファイル取得 バイナリ化
ini_set('memory_limit', -1);
//$fileContents = file_get_contents($file, FILE_USE_INCLUDE_PATH);
// tmpを使ってみる
$fileContents = file_get_contents($file_actual, FILE_USE_INCLUDE_PATH);


// echo "---------";
// echo "<br>fileContents";
//var_dump($fileContents);
//echo "---------";

$data = '';
$boundary = '---------------------'.substr(md5(rand(0,32000)), 0, 10);

foreach ($params as $key => $val) {
    echo "foreach";
    $data .= "--$boundary\n";
    $data .= "Content-Disposition: form-data; name=\"".$key."\"\n\n".$val."\n";
}
$data .= "--$boundary\n";

$data .= "Content-Disposition: form-data; name=\"file\"; filename=\"".$file_name."\"\n";
$data .= "Content-Type: application/octet-stream\n";
$data .= "Content-Transfer-Encoding: binary\n\n";
$data .= $fileContents."\n";
$data .= "--$boundary--\n";

$params = array('http' => array(
'method' => 'POST',
'header' => 'Content-Type: multipart/form-data; boundary=' . $boundary,
'content' => $data
));

// $data = '';
// $data .= "Content-Disposition: form-data; name=\"file\"; filename=\"".$file_name."\"\n";
// $data .= "Content-Type: application/octet-stream\n";
// $data .= "Content-Transfer-Encoding: binary\n\n";
// $data .= $fileContents."\n";

// $params = array('http' => array(
// 'method' => 'POST',
// 'header' => 'Content-Type: multipart/form-data;',
// 'content' => $data
// ));

$context = stream_context_create($params);

//送信する
$contents = "";
$contents = file_get_contents($apiURL, false, $context);

var_dump($contents);

$upFileInfo = explode(',',$contents);
$filekey = $upFileInfo[1];

echo "get-filekey->" . $filekey;

// コンテンツタイプ取得
$type = 'video';
$name = 'sample_movie';

$param  = "?ticket=" . $ticket;
$param .= "&filekey=" . $filekey;
$param .= "&name=" . $name;
$param .= "&type=" . $type;
//$param .= "&parent_id_contents=".$parent_id_contents;
$param .= "&parent_id_contents=";
$param .= "&description=";
$param .= "&metatag=";
$param .= "&visible=1";
$param .= "&meta_url=";
$param .= "&update_date=";
$param .= "&common_create=1";
if ($type == 'audio') { $param .= "&common_id_recipe=1001"; } else { $param .= "&common_id_recipe=3"; }
$param .= "&common_pc_nt=0";
$param .= "&keitai_create=1";
$param .= "&keitai_keitaimeta_name=" . $name;
$param .= "&keitai_keitaimeta_description=";
$param .= "&keitai_keitaimeta_author=";
$param .= "&keitai_keitaimeta_copyright=";
$param .= "&keitai_encoding_quality=1";
$param .= "&youtube_create=0";
$param .= "&youtube_youtubemeta_name=";
$param .= "&youtube_youtubemeta_description=";
$param .= "&autocommit=1";
$param .= "&usermeta=";

//$apiURL = MILLVI_API_BASE_URL . MILLVI_API_CREATE_VIDEO . $param;
$apiURL = "https://capi.miovp.com/contents/create_video" . $param;;
echo "<br>--------";
echo "<br>apiurl->" . $apiURL;
$content = file_get_contents($apiURL);
echo "<br>--------";
var_dump($content);
$ret = json_decode($content, TRUE);

echo "<br>create video finish";
var_dump($ret);
exit;



    // <<SQL CONNECT SCRIPT>>
    // <<QUERY TO GET NEW IMAGE NAME>>
        
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        #echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        #echo "File is not an image.";
        $uploadOk = 0;
    }
//}
// Check if file already exists
if (file_exists($target_file)) {
    #echo "Sorry, file already exists.";
    $uploadOk = 0;
}

echo "uploadOk->". $uploadOk;
echo "<br>";
echo "finish";
exit;
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    #echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    #echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    #echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $newTarget = "uploads/".$newMax.".".$imageFileType;
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newTarget)) {
       # echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //<<QUERY TO ADD FILE DETAILS TO DATABASE>>
    } else {
        #echo "Sorry, there was an error uploading your file.";
    }
}