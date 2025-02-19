<?php
include_once "../Connection.php";
header("Content-Type: application/json"); // Ensure JSON response
error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = ["success" => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = trim($_POST['imie'] ?? '');
    $nazwisko = trim($_POST['nazwisko'] ?? '');
    $klasa = intval($_POST['klasa'] ?? 0);
    $rok_urodzenia = intval($_POST['rok_urodzenia'] ?? 0);
    $wzrost = intval($_POST['wzrost'] ?? 0);

    // Basic validation (ensure required fields are not empty)
    if (empty($imie) || empty($nazwisko) || $klasa <= 0 || $rok_urodzenia <= 0 || $wzrost <= 0) {
        $response["message"] = "Invalid input data.";
        echo json_encode($response);
        exit;
    }

    try {
        $connection = new Connection("editWorker");

        $stmt = $connection->getPDO()->prepare("INSERT INTO `zawodnicy` (imie, nazwisko, klasa, rokurodzenia, wzrost) VALUES (:imie, :nazwisko, :klasa, :rok_urodzenia, :wzrost)");
        $stmt->bindParam(":imie", $imie, PDO::PARAM_STR);
        $stmt->bindParam(":nazwisko", $nazwisko, PDO::PARAM_STR);
        $stmt->bindParam(":klasa", $klasa, PDO::PARAM_INT);
        $stmt->bindParam(":rok_urodzenia", $rok_urodzenia, PDO::PARAM_INT);
        $stmt->bindParam(":wzrost", $wzrost, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "User added successfully.";
            $response["new_id"] = $connection->getPDO()->lastInsertId(); // Return the new user's ID
        } else {
            $response["message"] = "Database error: Insert failed.";
        }

        $connection->close();
    } catch (Exception $e) {
        $response["message"] = "Exception: " . $e->getMessage();
    }
} else {
    $response["message"] = "Invalid request.";
}

echo json_encode($response);
exit;
?>