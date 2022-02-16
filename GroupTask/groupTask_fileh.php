<?php
//You are required to work as a team and complete the following task during the online session
// we will check your implementation on 16.02.2022 and the team repo must contain the following task
// Each one of you will first do it in your own repo (or branch) and then the final version in the team repo. 
// This task is not graded however will have some impact on the final grade
// It also will help you to practice utlizing GitHub in project work

# 1. Create/read a text file by using approprite php functions 
    # Step 1: check if file exists or not
    # Step 2: Open the file using appropriate mode. (each member opens the file in different mode)
    # Step 3: Use fwrite/fread function to write/read on the file your team name and members name. 
    # Step 4: Close the file 

    $filename = 'textFile.txt';

    if (file_exists($filename)) {
        echo "The file $filename exists";
    } 
    else {
        echo "The file $filename does not exist";
    }
    
    echo "<br>";
    $file=fopen($filename,"w+") or die("unable to open file");
    
    fwrite($file,"Group 8: Eduardo, Hanna, Yasser");
    
    fseek($file,0);
    echo fread($file,filesize($filename));
    
    
    fclose($file);

#2. Uploaing files 
     # Step 1: Create a simple html form to upload a file. 
     # Step 2: You are required to limit the upload file size to 2 MB. 
     # Step 3: Make sure that users can submit only images. 
     # Step 4: Upon successful upload, you print a message "File uploaded successfully" and also 
     # provide the link to the directory where files are uploaded.

     echo '<form action="groupTask_fileh.php" method="post" enctype="multipart/form-data">
     <input type="file" id="uploud" name="uploadFile">
     <input type="submit" name="submit">
     </form>';
     
     $target_dir = "uploads/";
     $uploadOk = 1;
     
     if(isset($_POST["submit"])) {
         $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
         $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
         if($check !== false) {
             $uploadOk = 1;
         } else {
             echo "File is not an image.";
             $uploadOk = 0;
         }
         if ($_FILES["uploadFile"]["size"] > 2000000) {
             $uploadOk = 0;
         }
         if ($uploadOk == 0) {
             echo "Sorry, your file was not uploaded.";
         }
         else {
             if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
               echo 'File uploaded successfully<br><a href="uploads/">Uploads<a>';
             } 
             else {
               echo "Sorry, there was an error uploading your file.";
             }
         }
     }
?>