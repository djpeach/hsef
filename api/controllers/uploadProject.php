<?php

require_once 'DB.php';

if(isset($_POST["submit"]))
{
 
echo $filename=$_FILES["file"]["name"];
$ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
 
//we check,file must be have csv extention
if($ext=="csv")
{
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $sql = "INSERT into Project(ProjectId,Number,Name,Abstract,BoothId,CourseNetworkingId,CategoryId) values('$emapData[0]','$emapData[1]','$emapData[2],$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
            mysqli_query($con, $sql);
         }
         fclose($file);
         echo "CSV File has been successfully Imported.";
}
else {
    echo "Error: Please Upload only CSV File";
}
 
 
}
?>