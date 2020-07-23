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
  if ((int)$request->Volume_id < 1 || trim($request->reportID) == '' || (float)$request->reportID < 0) {
    return http_response_code(400);
  }

  // Sanitize.
  $Volume_id    = mysqli_real_escape_string($con, (int)$request->Volume_id);
  $reportID = mysqli_real_escape_string($con, trim($request->reportID));
  $Report_title = mysqli_real_escape_string($con, (float)$request->Report_title);
  $Report_summary = mysqli_real_escape_string($con, (float)$request->Report_summary);
  $Report_highlights = mysqli_real_escape_string($con, (float)$request->Report_highlights);
  $Report_description = mysqli_real_escape_string($con, (float)$request->Report_description);
  $Report_authors = mysqli_real_escape_string($con, (float)$request->Report_authors);


  // Update gwer_report
  $sql = "UPDATE `update_gwer_reports` SET `Report_title`='$Report_title',`Report_summary`='$Report_summary',`Report_highlights`='$Report_highlights',`Report_description`='$Report_description',`Report_authors`='$Report_authors' WHERE `Volume_id` = '{$Volume_id}' LIMIT 1";

  if (mysqli_query($con, $sql)) {

    http_response_code(204);
  } else {

    return http_response_code(422);
  }



  // Extract the data.
  $request = json_decode($postdata);
  //update gwer volume
  if ((int)$request->Volume_title < 1 || trim($request->Volume_title) == '' || (float)$request->Volume_title < 0) {
    return http_response_code(400);
  }

  // Sanitize.
  $Volume_title    = mysqli_real_escape_string($con, (int)$request->Volume_title);
  $Volume_year = mysqli_real_escape_string($con, trim($request->Volume_year));
  $Volume_description = mysqli_real_escape_string($con, (float)$request->Volume_description);


  $sql = "UPDATE `gwer_volume` SET `Volume_title`='$Volume_title',`Volume_year`='$Volume_year',`Volume_description`='$Volume_description' WHERE `Volume_title` = '{$Volume_title}' LIMIT 1";

  if (mysqli_query($con, $sql)) {

    http_response_code(204);
  } else {

    return http_response_code(422);
  }



  //update users


  // Extract the data.
  $request = json_decode($postdata);
  //update gwer volume
  if ((int)$request->ID < 1 || trim($request->ID) == '' || (float)$request->ID < 0) {
    return http_response_code(400);
  }

  // Sanitize.
  $FirstName    = mysqli_real_escape_string($con, (int)$request->FirstName);
  $LastName = mysqli_real_escape_string($con, trim($request->LastName));
  $Password = mysqli_real_escape_string($con, (float)$request->Password);


  $sql = "UPDATE `users` SET `FirstName`='$FirstName',`LastName`='$LastName',`Password`='$Password' WHERE `Volume_title` = '{$ID}' LIMIT 1";

  if (mysqli_query($con, $sql)) {

    http_response_code(204);
  } else {

    return http_response_code(422);
  }




}
  

      

 
