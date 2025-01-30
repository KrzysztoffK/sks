<?php 
class Query {
    public static function noParams(PDO $connection, String $query) {
        try {
            $stmt = $connection->query($query);
            return $stmt;
        } catch (PDOException $e){
            echo "Query failed: ". $e->getMessage();
        }
    }

    public static function formatJSON(PDOStatement $stmt) {
        $dataJSON = [];
        try {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $dataJSON[] = $row;
            }
            return json_encode($dataJSON);
        } catch (PDOException $e) {
            echo "JSON formatting failed: ". $e->getMessage();
        }

    }
}
?>