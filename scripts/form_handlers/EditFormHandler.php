<?php
    include_once "../Connection.php";
    include_once "../Query.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        
        $id = intval($_POST['id']);
        $connection_read = new Connection("readWorker");

        $stmt = $connection_read->getPDO()->prepare("SELECT * FROM `zawodnicy` WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $player = Query::formatJSON($stmt);
    
        if ($player) {
            echo $player;
        } else {
            echo json_encode(["error" => "Player not found"]);
        }

        $connection_read -> close();
    }
    exit; 
?>