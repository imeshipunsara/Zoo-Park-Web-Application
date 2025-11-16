<?php

include "config.php";
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    $time = time();
    $randomString .= $time;
    return $randomString;
}

function uploadFile($PostFileName)
{
    try {
        $originalFileName = $_FILES[$PostFileName]["name"];

        if (!isset($_FILES[$PostFileName])) {
            return array(
                'uploadOk' => 0,
                'error' => "No file selected:" . $PostFileName,
                'file_name' => null,
            );
        }

        // Flag to check if the upload is successful
        $uploadOk = 1;

        // Get the file extension (.jpg ,.png)
        $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

        $gen_file_name = generateRandomString(20) . "." . $imageFileType;
        // Path to the file
        $target_file = '../uploads/' . $gen_file_name;

        $error = null;
        // Check if the image file is an actual image or a fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$PostFileName]["tmp_name"]);
            if ($check !== false) {
                $error = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error = "File is not an image.";
                $uploadOk = 0;
            }
        }


        // Check file size (e.g., limit to 10MB)
        if ($_FILES[$PostFileName]["size"] > 10000000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";
            // If everything is ok, try to upload the file
        } else {
            if (move_uploaded_file($_FILES[$PostFileName]["tmp_name"], $target_file)) {

            } else {
                $uploadOk = 0;
                $error = "Sorry, there was an error uploading your file.";
            }
        }

        // if error = null and uploadOk = 1, then file uploaded successfully
        // otherwise, there was an error
        return [
            'uploadOk' => $uploadOk,
            'error' => $error,
            'file_name' => $gen_file_name,
        ];
    } catch (Exception $ex) {
        return [
            'uploadOk' => 0,
            'error' => $ex->getMessage(),
            'file_name' => null,
        ];
    }
}

function deleteOldImage($image)
{
    try {
        if ($image != null) {
            if (file_exists('../uploads/' . $image)) {
                unlink('../uploads/' . $image);
            }
        }
    } catch (Exception $ex) {
        throw new Exception("Error deleting old image:" . $ex->getMessage());
    }
}
?>