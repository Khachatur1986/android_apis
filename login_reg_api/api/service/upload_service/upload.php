<?php
//https://cloudinary.com/blog/file_upload_with_php
$currentDir = getcwd();
$uploadDirectory = "/../../uploads/";

$errors = []; // Store all foreseen and unforseen errors here

$fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions

$fileName = $_FILES['my_photo_file']['name'];
$fileSize = $_FILES['my_photo_file']['size'];
$fileTmpName = $_FILES['my_photo_file']['tmp_name'];
$fileType = $_FILES['my_photo_file']['type'];
$arr = explode('.', $fileName);
$fileExtension = strtolower(end($arr));

$uploadPath = $currentDir . $uploadDirectory . basename($fileName);

$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

//if (isset($_POST['submit'])) {

    /*if (! in_array($fileExtension,$fileExtensions)) {
        //$errorsMessage[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        $errorsMessage = "This file extension is not allowed. Please upload a JPEG or PNG file";
        return array(
            "status" => false,
            "message" => $errorsMessage,
        );
    }*/

    /*    if ($fileSize > 2000000) {
            //$errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            $errorsMessage = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            return array(
                "status" => false,
                "message" => $errorsMessage,
            );
        }*/

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if (!$didUpload) {
            $response =  array(
                "status" => true,
                "message" => "The file " . basename($fileName) . " has been uploaded",
            );
        } else {
            $response =  array(
                "status" => false,
                "message" => "An error occurred somewhere. Try again or contact the admin",
            );
        }
    } else {
        foreach ($errors as $error) {
            //echo $error . "These are the errors" . "\n";
            $response =  array(
                "status" => false,
                "message" => $error . "These are the errors",
            );
        }
    }

    echo json_encode($response);
//}
?>