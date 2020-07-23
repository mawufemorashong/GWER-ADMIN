<?php

require 'database.php';
require 'functions.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if (trim($request->number) === '' || (float)$request->amount < 0) {
        return http_response_code(400);
    }

    // Sanitize.
    $number = mysqli_real_escape_string($con, trim($request->number));
    $amount = mysqli_real_escape_string($con, (int)$request->amount);


        // Create.
        //add reports
        $now = new DateTime();
        $reportDate = $now->format('D, M j, Y \a\t g:i a');

        $sql = "INSERT INTO `gwer_report`(`Volume_id`,`Report_id`,`Report_title`,`Report_summary`,`Report_highlights`,`Report_this_issue`,`Report_date`,`Report_description`,`Report_authors`) VALUES (null,'{$volumeID}','{$reportID}','{$reportTitle}','{$reportSummary}','{$reportHighlights}','{$reportThisIssue}','{$reportDate}','{$reportDescription}','{$reportAuthors}')";

        if (mysqli_query($con, $sql)) {
            http_response_code(201);

            $newVolume = [

                'Volume_id' => $volumeID,
                'Report_id' => $reportID,
                'Report_title' => $reportTitle,
                'Report_summary' => $reportSummary,
                'Report_highlights' => $reportHighlights,
                'Report_this_issue' => $reportThisIssue,
                'Report_date' => $reportDate,
                'Report_description' => $reportDescription,
                'Report_authors' => $reportAuthors,

                'id'    => mysqli_insert_id($con)
            ];

            echo json_encode($newVolume);
        } else {
            http_response_code(422);
        }
    



        //add volume
        $sql = "INSERT INTO `add_gwer_volume`(`Volume_id`,`Volume_title`,`Volume_year`,`Volume_description`) VALUES (null,'{$volumeID}','{$volumeTitle}','{$volumeYear}','{$volumeDescription}')";

        if (mysqli_query($con, $sql)) {
            http_response_code(201);

            $newVolume = [

                'Volume_id' => $volumeID,
                'Volume_title' => $volumeTitle,
                'Volume_year' => $volumeYear,
                'Volume_description' => $volumeDescription,

                'id'    => mysqli_insert_id($con)
            ];

            echo json_encode($newVolume);
        } else {
            http_response_code(422);
        }
    




        //add users
        $sql = "INSERT INTO `users`(`ID`,`FirstName`,`LastName`,`Email`,`Password`,`Role`) VALUES (null,'{$ID}','{$firstName}','{$lastName}','{$email}','{$password}','{$role}')";

        if (mysqli_query($con, $sql)) {
            http_response_code(201);

            $newUser = [

                'ID' => $ID,
                'FirstName' => $firstName,
                'LastName ' => $lastName,
                'Email' => $email,
                'Password' => $password,
                'Role' => $role,

                'id'    => mysqli_insert_id($con)
            ];

            if ($role == 'ADMIN') {
                ///set as admin
            }

            echo json_encode($newUser);
        } else {
            http_response_code(422);
        }
    
}
