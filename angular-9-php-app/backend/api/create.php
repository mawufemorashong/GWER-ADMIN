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
  if(trim($request->number) === '' || (float)$request->amount < 0)
  {
    return http_response_code(400);
  }

  // Sanitize.
  $number = mysqli_real_escape_string($con, trim($request->number));
  $amount = mysqli_real_escape_string($con, (int)$request->amount);


  // Create.
    function add_gwer_report($volumeID, $reportID, $reportTitle, $reportSummary, $reportHighlights, $reportThisIssue, $reportDescription, $reportAuthors)
    {
        $now = new DateTime();
        $reportDate = $now->format('D, M j, Y \a\t g:i a');

        $sql = "INSERT INTO `gwer_report`(`Volume_id`,`Report_id`,`Report_title`,`Report_summary`,`Report_highlights`,`Report_this_issue`,`Report_date`,`Report_description`,`Report_authors`) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute([$volumeID, $reportID, $reportTitle, $reportSummary, $reportHighlights, $reportThisIssue, $reportDate, $reportDescription, $reportAuthors]);
        if ($success) {
            echo "New report added";
        }
    }


     function add_gwer_volume($volumeID, $volumeTitle, $volumeYear, $volumeDescription)
    {
      
        $sql = "INSERT INTO `add_gwer_volume`(`Volume_id`,`Volume_title`,`Volume_year`,`Volume_description`) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute([$volumeID, $volumeTitle, $volumeYear, $volumeDescription]);
        if ($success) {
            echo "New volume added";
        }
    }


    function add_user($ID, $firstName, $lastName, $email, $password, $role)
    {
      
        $sql = "INSERT INTO `users`(`ID`,`FirstName`,`LastName`,`Email`,`Password`,`Role`) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute([$ID, $firstName, $lastName, $email, $password, $role]);
        if ($success) {
            echo "New user added";
        }
    }

}