<?php
include 'db.php';

if(isset($_POST['submit'])){
   $file = $_FILES['file'];
    //print_r($file);
   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileType = $_FILES['file']['type'];
   $fileError = $_FILES['file']['error'];
   $fileSize = $_FILES['file']['size'];



   $fileExt = explode('.',$fileName);

   $fileActualExt = strtolower(end($fileExt));
   $allow = array('jpg','jpeg','png','pdf');

   if(in_array($fileActualExt,$allow)){
        if($fileError ===0 ){
                if($fileSize < 1000000){
                        $fileNameNew = time().rand(1000,9999).".".$fileActualExt;
                      //  $fileNameNew = uniqid('',true).".".$fileActualExt;
                      
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        //header("Location:index.php? uploadsuccess");
                         echo 'success upload';

                         // aba: for upload into database
                          $sql = "insert into upfile(title,image) values('hi','$fileNameNew ')";
                          $result = mysqli_query($con,$sql);
                          if(!$result){
                            echo 'error';

                          }
                          else{
                            echo 'success';
                          }

                    }
                else{
                    echo 'your file is too big!!';
                            }
        }
        else{
            echo 'there was error in upload file';
        }

   }else{
    echo 'You can not upload files of this type!!!';
   }



}


