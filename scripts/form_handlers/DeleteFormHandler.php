<?php
    include_once "../Connection.php";
    header("Content-Type: application/json"); // Ensure response is JSON
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $response = ["success" => false]; // Default response

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        try {
            $connection_write = new Connection("editWorker");

            $stmt = $connection_write->getPDO()->prepare("DELETE FROM `zawodnicy` WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $response["success"] = true;
            } else {
                $response["message"] = "Database error: could not delete user.";
            }

            $connection_write->close();
        } catch (Exception $e) {
            $response["message"] = "Exception: " . $e->getMessage();
        }
    } else {
        $response["message"] = "Invalid request.";
    }
    ob_clean();
    echo json_encode($response);
    exit;
?>