<?php

require_once 'functions.php';

// if(isset($_GET['user'])){

//     if(isset($_POST['add-post-submit'])){

//     $image = $_FILES['image'];

//     $imageName = $_FILES['image']['name'];
//     $imageTmpName = $_FILES['image']['tmp_name'];
//     $imageSize = $_FILES['image']['size'];
//     $imageError = $_FILES['image']['error'];
//     $imageType = $_FILES['image']['type'];

//     $imageExt = explode('.', $imageName);
//     $imageActualExt = strtolower(end($imageExt));

//     $allowed = array('jpg', 'jpeg', 'png', 'pdf');

//     if(in_array($imageActualExt, $allowed)){
//         if($imageError === 0){
//             if($imageSize < 1000000){
//                 $imageNameNew = uniqid('', true).".".$imageActualExt;
//                 $imageDestination = '../images/'.basename($imageNameNew);
//                 $saveData = [
//                     'title' => $title = $_POST['title'],
//                     'textarea' => $textArea = $_POST['textarea'],
//                     'image' => $imageNameNew,
//                     'user_id' => $userID = $_POST['user_id'],
//                     'posted_by' => $postedBy = $_SESSION['user']['username']
//                 ];
            
//                 saveToDB($pdo, 'posts', $saveData);
//                 if (move_uploaded_file($imageTmpName, $imageDestination)) {
//                     echo "Image uploaded successfully";
//                 } else {
//                     echo "error";
//                 }

//             } else {
//                 echo "Your file is to big";
//             }
//         } else {
//             echo "there was an error uploading your file!"; 
//         }
//     } else {
//         echo "You cannot upload files of this type";
//     }
    

    

//     //header('Location: home.php');
// }

// $userID = $_GET['user'];
// $postByUserStatement = joinUserWithPost($pdo, $userID);
// $postByUser = $postByUserStatement->fetchAll(PDO::FETCH_CLASS);
// }


if(isset($_GET['user'])){

    if(isset($_POST['add-post-submit'])){
        $imageInput = 'image';
        $folder = '../images/';
        $imageByteSize = 5000000;
        $imageName = addImageToFolder($imageInput, $folder, $imageByteSize);

        $saveData = [
            'title' => $title = $_POST['title'],
            'textarea' => $textArea = $_POST['textarea'],
            'image' => $imageName,
            'user_id' => $userID = $_POST['user_id'],
            'posted_by' => $postedBy = $_SESSION['user']['username']
        ];
        saveToDB($pdo, 'posts', $saveData);

}

$userID = $_GET['user'];
$postByUserStatement = joinUserWithPost($pdo, $userID);
$postByUser = $postByUserStatement->fetchAll(PDO::FETCH_CLASS);
}