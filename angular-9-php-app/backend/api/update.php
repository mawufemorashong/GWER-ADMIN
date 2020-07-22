<?php
require 'database.php';
require 'functions.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if ((int)$request->id < 1 || trim($request->number) == '' || (float)$request->amount < 0) {
    return http_response_code(400);
  }

  // Sanitize.
  $id    = mysqli_real_escape_string($con, (int)$request->id);
  $number = mysqli_real_escape_string($con, trim($request->number));
  $amount = mysqli_real_escape_string($con, (float)$request->amount);

  // Update.
    function update_gwer_report($volumeID, $reportID, $reportTitle, $reportSummary, $reportHighlights, $reportThisIssue, $reportDescription, $reportAuthors)
    {    
        $sql = "UPDATE `gwer_report` SET
        `Volume_id` = ?,
        `Report_title`= ?,
        `Report_summary`= ?,
        `Report_highlights`= ?,
        `Report_this_issue`= ?,
        `Report_description`= ?,
        `Report_authors`= ?
        WHERE Report_id=?";
         $stmt= $this->conn->prepare($sql);
         if ($stmt->execute([$volumeID, $reportTitle, $reportSummary, $reportHighlights, $reportThisIssue, $reportDescription, $reportAuthors, $reportID])) {
             echo "Saved";
         } else {
             echo "Something went wrong";
         }
    }

     function update_gwer_volume($volumeID, $volumeTitle, $volumeYear, $volumeDescription)
    {    
        $sql = "UPDATE `gwer_volume` SET
        `Volume_title`= ?,
        `Volume_year`= ?,
        `Volume_description`= ?
        WHERE Volume_id=?";
         $stmt= $this->conn->prepare($sql);
         if ($stmt->execute([$volumeTitle, $volumeYear, $volumeDescription,$volumeID])) {
             echo "Saved";
         } else {
             echo "Something went wrong";
         }
    }


     function update_user($ID, $firstName, $lastName, $email, $password, $role)
    {    
        $sql = "UPDATE `users` SET
        `FirstName` = ?,
        `LastName`= ?,
        `Email`= ?,
        `Password`= ?,
        `Role`= ?
        WHERE `ID`=?";
         $stmt= $this->conn->prepare($sql);
         if ($stmt->execute([$firstName, $lastName, $email, $password, $role, $ID])) {
             echo "Saved";
         } else {
             echo "Something went wrong";
         }
    }


  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}