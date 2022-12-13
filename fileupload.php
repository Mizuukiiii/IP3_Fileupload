<?php
  array_map('unlink', glob("files/*"));
?>
<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>

<form action="fileupload.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submit1"> <br/>

</form>
<?php
  if(isset($_POST['Submit1']))
  { 
    $filepath = "files/" . $_FILES["file"]["name"];
    $fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];
    
    if($fileType == "video/mp4" || $fileType == "audio/mp3" || $fileType == "image/jpeg" || $fileType == "image/png") {
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        if($fileType == "video/mp4") {
          echo '<video width="320" height="240" controls>
                  <source src="'.$filepath.'" type="video/mp4">
                  Your browser does not support the video tag.
                </video>';
        }
        else if($fileType == "audio/mpeg") {
          echo '<audio controls>
                  <source src="'.$filepath.'" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>';
        }
        else if($fileType == "image/jpeg" || $fileType == "image/png") {
          echo '<img src="'.$filepath.'" alt="Uploaded image">';
        }
      }
    }
    else {
      echo "File type is not allowed. Please select a video, audio, or image file.";
    }
  } 
?>


</body>
</html>
