<?php

if(isset($_GET['action'])){
    $function=$_GET['action'];
}else $function='';

switch($function){

    case 'add_event':
        add_event();
        break;

    case 'DeleteEvent':
        DeleteEvent();
        break;

    case 'EditEvent':
        EditEvent();
        break;    

    case 'add_blog':
        add_blog();
        break;

    case 'DeleteBlog':
        DeleteBlog();
        break;

    case 'EditBlog':
        EditBlog();
        break;

    case 'add_gallery':
        add_gallery();
        break;

    case 'DeleteGallery':
        DeleteGallery();
        break;

    case 'EditGallery':
        EditGallery();
        break;

    default :
    echo 'no function';
       
}

function add_event(){
    include('db_connect.php');
    
        
        $Event_name=$_POST["Event_name"];
        $Date=$_POST["Date"];
        $Description=$_POST["Description"];
        
        $allowed = array('jpg','png','jpeg','gif');
        $filename = $Event_name ."_" . $_FILES["fileDoc"]["name"];
        $filetype = $_FILES["fileDoc"]["type"];
        $filesize = $_FILES["fileDoc"]["size"];
        $temp_name = $_FILES["fileDoc"]["tmp_name"];
        $uploadTo = "assets/images/background/"; 

        if(!file_exists($_FILES['fileDoc']['tmp_name']) || !is_uploaded_file($_FILES['fileDoc']['tmp_name'])) {
            $insert="INSERT INTO `tbl_event`( `Name_event`, `Description`, `event_date`, `Image`) 
            VALUES  ('$Event_name','$Description','$Date','')";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='add_event.php';alert('Something went wrong !!');</script>";
            }else{                                                   
                echo "<script> location.href='add_event.php';alert('Added Successfully..');</script>";                
            }  
        }
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext, $allowed)){
            die("<script>location.href='add_event.php';alert('Only jpg, gif, and png files are allowed.');</script>");
            //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
        } 
    
        // Verify file size - 5MB maximum
        $maxsize = 1 * 1024 * 1024;
        if($filesize > $maxsize)
        { 
            die("<script>location.href='add_event.php';alert('File size is larger than the allowed limit.');</script>");
            //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
        }
    
        // Verify MYME type of the file
        if(in_array($ext, $allowed)){
            // Check whether file exists before uploading it
                                           
            $insert="INSERT INTO `tbl_event`(`Name_event`, `Description`, `event_date`, `Image`) 
            VALUES  ('$Event_name','$Description','$Date','$filename')";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='add_event.php';alert('Something went wrong !!');</script>";
            }else{
                if(copy($temp_name, $uploadTo.$filename)){                                      
                    echo "<script> location.href='add_event.php';alert('Added Successfully..');</script>";
                }
            }                            
        } else{
            echo "<script>location.href='add_event.php'; alert('There was a problem uploading your file. Please try again');</script>";
        }
    }

    

function DeleteEvent(){
    include('db_connect.php');
      
    $key_code=$_GET["key"];
    
    $delet="DELETE FROM `tbl_event` WHERE Keycode=$key_code";
              //echo $insert;
    $result=mysqli_query($conn,$delet); 
    if($result){
        echo "<script> location.href='view_event.php'; alert('Event Deleted Successfully..');</script>"; 
    }else{
        echo "<script> location.href='view_event.php';  alert('Something went wrong !! Please try again..');</script>";
    } 
}

function EditEvent(){
    include('db_connect.php');
      
    $key_code=$_GET["key"];
    $Event_name=$_POST["Event_name"];
    $Date=$_POST["Date"];
    $Description=$_POST["Description"];

    $filedelete = $_POST["deleteFile"];
    
    $allowed = array('jpg','png','jpeg','gif');
    $filename = $Event_name ."_" . $_FILES["fileDoc"]["name"];
    $filetype = $_FILES["fileDoc"]["type"];
    $filesize = $_FILES["fileDoc"]["size"];
    $temp_name = $_FILES["fileDoc"]["tmp_name"];
    $uploadTo = "assets/images/background/"; 

    if($filedelete == null && !file_exists($_FILES['fileDoc']['tmp_name'])) {
        $insert="UPDATE `tbl_event` SET `Name_event`='$Event_name',`Description`='$Description',
        `event_date`='$Date' WHERE  `Keycode`='$key_code'";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='view_event.php';alert('Something went wrong !!');</script>";
            }else{                                                   
                echo "<script> location.href='view_event.php';alert('Updated Successfully..');</script>";                
            }  
    }elseif($filedelete == null && file_exists($_FILES['fileDoc']['tmp_name'])){        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(!in_array($ext, $allowed)){
              die("<script>location.href='view_event.php';alert('Only jpg, gif, and png files are allowed.');</script>");
              //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
          } 
      
          // Verify file size - 5MB maximum
          $maxsize = 1 * 1024 * 1024;
          if($filesize > $maxsize)
          { 
              die("<script>location.href='view_event.php';alert('File size is larger than the allowed limit.');</script>");
              //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
          }
      
          // Verify MYME type of the file
          if(in_array($ext, $allowed)){
              // Check whether file exists before uploading it
                                             
              $insert="UPDATE `tbl_event` SET `Name_event`='$Event_name',`Description`='$Description',
              `event_date`='$Date',`Image`='$filename' WHERE  `Keycode`='$key_code'";
            //   echo $insert;
              $result=mysqli_query($conn,$insert);
              if(!$result){
                  // echo "0";                    
                  echo "<script>location.href='view_event.php';alert('Something went wrong !!');</script>";
              }else{
                  if(copy($temp_name, $uploadTo.$filename)){                           
                      echo "<script> location.href='view_event.php';alert('Updated Successfully..');</script>";
                  }
              }                            
          } else{
              echo "<script>location.href='view_event.php'; alert('There was a problem uploading your file. Please try again');</script>";
          }
    }elseif(!file_exists($_FILES['fileDoc']['tmp_name']) && $filedelete != null){
        $insert="UPDATE `tbl_event` SET `Name_event`='$Event_name',`Description`='$Description',
        `event_date`='$Date' WHERE  `Keycode`='$key_code'";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='view_event.php';alert('Something went wrong !!');</script>";
            }else{                                                   
                echo "<script> location.href='view_event.php';alert('Updated Successfully..');</script>";                
            }  
    }elseif($filedelete != null && file_exists($_FILES['fileDoc']['tmp_name'])) {
        // echo $filedelete;
        unlink($uploadTo.$filedelete);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(!in_array($ext, $allowed)){
              die("<script>location.href='view_event.php';alert('Only jpg, gif, and png files are allowed.');</script>");
              //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
          } 
      
          // Verify file size - 5MB maximum
          $maxsize = 1 * 1024 * 1024;
          if($filesize > $maxsize)
          { 
              die("<script>location.href='view_event.php';alert('File size is larger than the allowed limit.');</script>");
              //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
          }
      
          // Verify MYME type of the file
          if(in_array($ext, $allowed)){
              // Check whether file exists before uploading it
                                             
              $insert="UPDATE `tbl_event` SET `Name_event`='$Event_name',`Description`='$Description',
              `event_date`='$Date',`Image`='$filename' WHERE  `Keycode`='$key_code'";
              $result=mysqli_query($conn,$insert);
              if(!$result){
                  // echo "0";                    
                  echo "<script>location.href='view_event.php';alert('Something went wrong !!');</script>";
              }else{
                  if(copy($temp_name, $uploadTo.$filename)){                                      
                      echo "<script> location.href='view_event.php';alert('Updated Successfully..');</script>";
                  }
              }                            
          } else{
              echo "<script>location.href='view_event.php'; alert('There was a problem uploading your file. Please try again');</script>";
          }
    }else{
        echo "<script>location.href='view_event.php';alert('Something went wrong !!');</script>";
    }    
}


function add_blog(){
    include('db_connect.php');
    
        
        $blog_ttile=$_POST["blog_ttile"];
        $Posted=$_POST["Posted"];
        $blog_desc=$_POST["blog_desc"];
        
        $allowed = array('jpg','png','jpeg','gif');
        $filename = $name ."_" . $_FILES["fileDoc"]["name"];
        $filetype = $_FILES["fileDoc"]["type"];
        $filesize = $_FILES["fileDoc"]["size"];
        $temp_name = $_FILES["fileDoc"]["tmp_name"];
        $uploadTo = "assets/images/background/"; 

        if(!file_exists($_FILES['fileDoc']['tmp_name']) || !is_uploaded_file($_FILES['fileDoc']['tmp_name'])) {
            $insert="INSERT INTO `tbl_blogs`(`Blog_title`, `Blog_desc`, `Posted_by`, `Blog_img`) 
            VALUES ('$blog_ttile','$blog_desc','$Posted','')";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='add_blog.php';alert('Something went wrong !!');</script>";
            }else{                                                   
                echo "<script> location.href='add_blog.php';alert('Added Successfully..');</script>";                
            }  
        }
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext, $allowed)){
            die("<script>location.href='add_blog.php';alert('Only jpg, gif, and png files are allowed.');</script>");
            //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
        } 
    
        // Verify file size - 5MB maximum
        $maxsize = 1 * 1024 * 1024;
        if($filesize > $maxsize)
        { 
            die("<script>location.href='add_blog.php';alert('File size is larger than the allowed limit.');</script>");
            //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
        }
    
        // Verify MYME type of the file
        if(in_array($ext, $allowed)){
            // Check whether file exists before uploading it
                                           
            $insert="INSERT INTO `tbl_blogs`(`Blog_title`, `Blog_desc`, `Posted_by`, `Blog_img`) 
            VALUES ('$blog_ttile','$blog_desc','$Posted','$filename')";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='add_blog.php';alert('Something went wrong !!');</script>";
            }else{
                if(copy($temp_name, $uploadTo.$filename)){                                      
                    echo "<script> location.href='add_blog.php';alert('Added Successfully..');</script>";
                }
            }                            
        } else{
            echo "<script>location.href='add_blog.php';alert('There was a problem uploading your file. Please try again');</script>";
        }
    }

    

function DeleteBlog(){
    include('db_connect.php');
      
    $key_code=$_GET["key"];
    
    $delet="DELETE FROM `tbl_blogs` WHERE Keycode=$key_code";
              //echo $insert;
    $result=mysqli_query($conn,$delet); 
    if($result){
        echo "<script> location.href='view_blog.php'; alert('bird Deleted Successfully..');</script>"; 
    }else{
        echo "<script> location.href='view_blog.php';  alert('Something went wrong !! Please try again..');</script>";
    } 
}

function EditBlog(){
    include('db_connect.php');
      
    $key_code=$_GET["key"];
    $blog_ttile=$_POST["blog_ttile"];
    $Posted=$_POST["Posted"];
    $blog_desc=$_POST["blog_desc"];

    $filedelete = $_POST["deleteFile"];
    
    $allowed = array('jpg','png','jpeg','gif');
    $filename = $name ."_" . $_FILES["fileDoc"]["name"];
    $filetype = $_FILES["fileDoc"]["type"];
    $filesize = $_FILES["fileDoc"]["size"];
    $temp_name = $_FILES["fileDoc"]["tmp_name"];
    $uploadTo = "assets/images/background/"; 

    if($filedelete == null && !file_exists($_FILES['fileDoc']['tmp_name'])) {
        $insert="UPDATE `tbl_blogs` SET `Blog_title`='$blog_ttile',`Posted_by`='$Posted',`Blog_desc`='$blog_desc'
         WHERE `Keycode`='$key_code'";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo $insert;                    
                echo "<script>location.href='view_blog.php';alert('Something went wrong !!');</script>";
            }else{                                                   
                echo "<script> location.href='view_blog.php';alert('Updated Successfully..');</script>";                
            }  
    }elseif($filedelete == null && file_exists($_FILES['fileDoc']['tmp_name'])){        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(!in_array($ext, $allowed)){
              die("<script>location.href='view_blog.php';alert('Only jpg, gif, and png files are allowed.');</script>");
              //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
          } 
      
          // Verify file size - 5MB maximum
          $maxsize = 1 * 1024 * 1024;
          if($filesize > $maxsize)
          { 
              die("<script>location.href='view_blog.php';alert('File size is larger than the allowed limit.');</script>");
              //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
          }
      
          // Verify MYME type of the file
          if(in_array($ext, $allowed)){
              // Check whether file exists before uploading it
                                             
              $insert="UPDATE `tbl_blogs` SET `Blog_title`='$blog_ttile',`Posted_by`='$Posted',`Blog_desc`='$blog_desc',
              `Blog_img`='$filename' WHERE `Keycode`='$key_code'";
              $result=mysqli_query($conn,$insert);
              if(!$result){
                  // echo "0";                    
                  echo "<script>location.href='view_blog.php';alert('Something went wrong !!');</script>";
              }else{
                  if(copy($temp_name, $uploadTo.$filename)){                           
                      echo "<script> location.href='view_blog.php';alert('Updated Successfully..');</script>";
                  }
              }                            
          } else{
              echo "<script>alert('There was a problem uploading your file. Please try again');</script>";
          }
    }elseif(!file_exists($_FILES['fileDoc']['tmp_name']) && $filedelete != null){
        $insert="UPDATE `tbl_blogs` SET `Blog_title`='$blog_ttile',`Posted_by`='$Posted',`Blog_desc`='$blog_desc'
         WHERE `Keycode`='$key_code'";
            $result=mysqli_query($conn,$insert);
            if(!$result){
                // echo "0";                    
                echo "<script>location.href='view_blog.php';alert('Something went wrong !!');</script>";
            }else{                                                   
                echo "<script> location.href='view_blog.php';alert('Updated Successfully..');</script>";                
            }  
    }elseif($filedelete != null && file_exists($_FILES['fileDoc']['tmp_name'])) {
        // echo $filedelete;
        unlink($uploadTo.$filedelete);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(!in_array($ext, $allowed)){
              die("<script>location.href='view_blog.php';alert('Only jpg, gif, and png files are allowed.');</script>");
              //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
          } 
      
          // Verify file size - 5MB maximum
          $maxsize = 1 * 1024 * 1024;
          if($filesize > $maxsize)
          { 
              die("<script>location.href='view_blog.php';alert('File size is larger than the allowed limit.');</script>");
              //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
          }
      
          // Verify MYME type of the file
          if(in_array($ext, $allowed)){
              // Check whether file exists before uploading it
                                             
              $insert="UPDATE `tbl_blogs` SET `Blog_title`='$blog_ttile',`Posted_by`='$Posted',`Blog_desc`='$blog_desc',
              `Blog_img`='$filename' WHERE `Keycode`='$key_code'";
              $result=mysqli_query($conn,$insert);
              if(!$result){
                  // echo "0";                    
                  echo "<script>location.href='view_blog.php';alert('Something went wrong !!');</script>";
              }else{
                  if(copy($temp_name, $uploadTo.$filename)){                                      
                      echo "<script> location.href='view_blog.php';alert('Updated Successfully..');</script>";
                  }
              }                            
          } else{
              echo "<script>alert('There was a problem uploading your file. Please try again');</script>";
          }
    }else{
        echo "<script>location.href='view_blog.php';alert('Something went wrong !!');</script>";
    }    
}

function add_gallery(){
    include('db_connect.php');

    
    $gallery_title=$_POST["gallery_title"];
    
    $allowed = array('jpg','png','jpeg','gif');
    $filename = $gallery_title ."_" . $_FILES["fileDoc"]["name"];
    $filetype = $_FILES["fileDoc"]["type"];
    $filesize = $_FILES["fileDoc"]["size"];
    $temp_name = $_FILES["fileDoc"]["tmp_name"];
    $uploadTo = "assets/images/background/"; 

    if(!file_exists($_FILES['fileDoc']['tmp_name']) || !is_uploaded_file($_FILES['fileDoc']['tmp_name'])) {
        $insert="INSERT INTO `tbl_gallery`( `img_title`, `img_file`) 
        VALUES ('$gallery_title','')";
        $result=mysqli_query($conn,$insert);
        if(!$result){
            // echo "0";                    
            echo "<script>location.href='add_gallery.php';alert('Something went wrong !!');</script>";
        }else{                                                   
            echo "<script> location.href='add_gallery.php';alert('Added Successfully..');</script>";                
        }  
    }

    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext, $allowed)){
        die("<script>location.href='add_gallery.php';alert('Only jpg, gif, and png files are allowed.');</script>");
        //echo "<script>location.href='./Form1.html';alert('Only .docx, .doc .pdf formats allowed to a max size of 5 MB');</script>";
    } 

    // Verify file size - 5MB maximum
    $maxsize = 10 * 1024 * 1024;
    if($filesize > $maxsize)
    { 
        die("<script>location.href='add_gallery.php';alert('File size is larger than the allowed limit.');</script>");
        //echo "<script>location.href='./Form1.html';alert('File size is larger than the allowed limit.');</script>";
    }

    // Verify MYME type of the file
    if(in_array($ext, $allowed)){
        // Check whether file exists before uploading it
                                        
        $insert="INSERT INTO `tbl_gallery`( `img_title`, `img_file`) 
        VALUES ('$gallery_title','$filename')";
        $result=mysqli_query($conn,$insert);
        if(!$result){
            // echo "0";                    
            echo "<script>location.href='add_gallery.php';alert('Something went wrong !!');</script>";
        }else{
            
            if(copy($temp_name, $uploadTo.$filename)){                                      
                echo "<script> location.href='add_gallery.php';alert('Added Successfully..');</script>";
            }
        }                            
    } else{
        echo "<script>location.href='add_gallery.php';alert('There was a problem uploading your file. Please try again');</script>";
    }
}

function DeleteGallery(){
    include('db_connect.php');
      
    $key_code=$_GET["key"];
    
    $delet="DELETE FROM `tbl_gallery` WHERE KeyCode=$key_code";
              //echo $insert;
    $result=mysqli_query($conn,$delet); 
    if($result){
        echo "<script> location.href='view_gallery.php'; alert('Deleted Successfully..');</script>"; 
    }else{
        echo "<script> location.href='view_gallery.php';  alert('Something went wrong !! Please try again..');</script>";
    } 
}
?>