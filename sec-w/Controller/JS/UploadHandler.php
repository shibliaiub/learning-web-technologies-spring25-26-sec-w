<?php 

$uploadFile = $_FILES["fileupload"];

$path="";
if($uploadFile){
    $uploadDirectory = "../uploads/";
    $path = $uploadDirectory . basename($uploadFile["name"]);
    $response = move_uploaded_file($uploadFile["tmp_name"], $path);
    echo "Path : ".$path;
    echo "<br/>Response : ".$response;
}


?>

<html>
    <body><img src="<?php echo $path;?>" height="200px" width="200px"/></body>
</html>