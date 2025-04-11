<?php
session_start();
header('Content-Type: application/json'); // set json response headers
$outData = upload(); // a function to upload the bootstrap-fileinput files

echo json_encode($outData); // return json data
exit(); // terminate


function upload() {
    
    $preview = $config = $errors = [];
    $input = 'upper'; 
    
    if (empty($_FILES[$input])) {
        $input = 'lower';
        
    $path ='lara/patient-case-studies/'; // your upload path
        $tmpFilePath = $_FILES[$input]['tmp_name']; // the temp file path
        $fileName = $_FILES[$input]['name']; // the file name
        $fileSize = $_FILES[$input]['size']; // the file size
        
        //Make sure we have a file path
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = $path .time().$fileName;
            $lowerFileUrl = $newFilePath;

            //Upload the file into the new path
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $_SESSION['lowerFileUrl']=$lowerFileUrl;
                $fileId = $lowerFileUrl; // some unique key to identify the file
                $preview[] = $lowerFileUrl;
                $config[] = [
                    'key' => $fileId,
                    'caption' => $lowerFileUrl,
                    'size' => $fileSize,
                    'downloadUrl' => $lowerFileUrl, // the url to download the file
                    'url' => 'http://localhost/delete.php', // server api to delete the file based on key
                ];                    
                    
               }}        
    }elseif(!empty($_FILES[$input])){
        
    $path ='lara/patient-case-studies/'; // your upload path
        $tmpFilePath = $_FILES[$input]['tmp_name']; // the temp file path
        $fileName = $_FILES[$input]['name']; // the file name
        $fileSize = $_FILES[$input]['size']; // the file size
        
        //Make sure we have a file path
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = $path .time().$fileName;
            $upperFileUrl = $newFilePath;
            //Upload the file into the new path
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $_SESSION['upperFileUrl']=$upperFileUrl;
                $fileId = $fileName; // some unique key to identify the file
                $preview[] = $upperFileUrl;
                $config[] = [
                    'key' => $fileId,
                    'caption' => $upperFileUrl,
                    'size' => $fileSize,
                    'downloadUrl' => $upperFileUrl, // the url to download the file
                    'url' => 'http://localhost/delete.php', // server api to delete the file based on key
                ];
                
               }}        
    }
    
    $input = 'refUpper'; 
    
    if (empty($_FILES[$input])) {
        $input = 'refLower';
    $path ='lara/patient-case-studies/'; // your upload path
        $tmpFilePath = $_FILES[$input]['tmp_name']; // the temp file path
        $fileName = $_FILES[$input]['name']; // the file name
        $fileSize = $_FILES[$input]['size']; // the file size
        
        //Make sure we have a file path
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = $path .time().$fileName;
            $lowerFileUrl = $newFilePath;

            //Upload the file into the new path
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $_SESSION['refLowerFileUrl']=$lowerFileUrl;
                $fileId = $lowerFileUrl; // some unique key to identify the file
                $preview[] = $lowerFileUrl;
                $config[] = [
                    'key' => $fileId,
                    'caption' => $lowerFileUrl,
                    'size' => $fileSize,
                    'downloadUrl' => $lowerFileUrl, // the url to download the file
                    'url' => 'http://localhost/delete.php', // server api to delete the file based on key
                ];                    
                    
               }}        
    }elseif(!empty($_FILES[$input])){
        
    $path ='lara/patient-case-studies/'; // your upload path
        $tmpFilePath = $_FILES[$input]['tmp_name']; // the temp file path
        $fileName = $_FILES[$input]['name']; // the file name
        $fileSize = $_FILES[$input]['size']; // the file size
        
        //Make sure we have a file path
        if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = $path .time().$fileName;
            $upperFileUrl = $newFilePath;
            //Upload the file into the new path
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $_SESSION['refUpperFileUrl']=$upperFileUrl;
                $fileId = $fileName; // some unique key to identify the file
                $preview[] = $upperFileUrl;
                $config[] = [
                    'key' => $fileId,
                    'caption' => $upperFileUrl,
                    'size' => $fileSize,
                    'downloadUrl' => $upperFileUrl, // the url to download the file
                    'url' => 'http://localhost/delete.php', // server api to delete the file based on key
                ];
                
               }}        
    }
    

    $out = ['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => true];
    if (!empty($errors)) {
        $img = count($errors) === 1 ? 'file "' . $error[0]  . '" ' : 'files: "' . implode('", "', $errors) . '" ';
        $out['error'] = 'Oh snap! We could not upload the ' . $img . 'now. Please try again later.';
    }
    
    return $out;
}

?>