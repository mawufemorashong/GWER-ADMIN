<?php

require 'database.php';
require 'functions.php';

// Extract, validate and sanitize the id.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($con, (int)$_GET['id']) : false;

if(!$id)
{
  return http_response_code(400);
}

// Delete.

        $sql = "DELETE FROM `delete_gwer_report` WHERE Volume_id = '{$VolumeID}' LIMIT 1";

        if(mysqli_query($con, $sql))

        {
            http_response_code(204);
        }
            else
        {
        return http_response_code(422);
    }
    


   
        $sql = "DELETE FROM `delete_gwer_volume` WHERE Volume_id = '{$VolumeID}' LIMIT 1";
       
        if(mysqli_query($con, $sql))

        {
            http_response_code(204);
        }
            else
        {
        return http_response_code(422);
    }
    


        $sql = "DELETE FROM `users` WHERE ID = '{$ID}' LIMIT 1";

        if (mysqli_query($con, $sql))

        {
            http_response_code(204);
        }
            else
        {
        return http_response_code(422);
    }