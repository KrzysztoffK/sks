<?php 
    include_once "../Connection.php";
    include_once "../Query.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

        $id = intval($_POST['id']);
        $connection_edit = new Connection("editWorker");

        $stmt = $connection_read->getPDO()->prepare("DELETE FROM `zawodnicy` WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $connection_edit -> close();
    }

?>