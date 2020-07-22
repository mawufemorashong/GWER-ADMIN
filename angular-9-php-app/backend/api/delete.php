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
 function delete_gwer_report($id)
    {
        $sql = "DELETE FROM `delete_gwer_report` WHERE Report_id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$id])) {
            echo "Deleted";
        }
    }
     function delete_gwer_volume($id)
    {
        $sql = "DELETE FROM `delete_gwer_volume` WHERE Volume_id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$id])) {
            echo "Deleted";
        }
    }

     function delete_user($id)
    {
        $sql = "DELETE FROM `users` WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$id])) {
            echo "Deleted";
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