<!-- <?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>
   <div class="view">

   </div>
        <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
        </form>
</body>
</html> -->
<!-- <html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html> -->

<?php
// uploading imahe on submit
if(isset($_POST['submit'])){ 

    upload_image(); 
  
}
function upload_image(){
    $uploadTo = "uploads/"; 
    $allowedImageType = array('jpg','png','jpeg','gif','pdf','doc');
    $imageName = $_FILES['file']['name'];
    $tempPath=$_FILES["file"]["tmp_name"];
   
    $basename = basename($imageName);
    $originalPath = $uploadTo.$basename; 
    $imageType = pathinfo($originalPath, PATHINFO_EXTENSION); 
    if(!empty($imageName)){ 
    
       if(in_array($imageType, $allowedImageType)){ 
         // Upload file to server 
         if(move_uploaded_file($tempPath,$originalPath)){ 
            echo $fileName." was uploaded successfully";
           // write here sql query to store image name in database
          
          }else{ 
            echo 'image Not uploaded ! try again';
          } 
      }else{
         echo $imageType." image type not allowed";
      }
   }else{  
    echo "Please Select a image";
   }       
}


?>
<form method="post" enctype="multipart/form-data">
<input type="file" name ="image" id="image">
<div id="preview"></div>
<input type="submit" name="submit">
</form>

