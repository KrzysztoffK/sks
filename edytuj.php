<html>
    <head>
        <title>SKS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./scripts/styles.css">
        <?php
            require_once "./scripts/Connection.php";
            require_once "./scripts/Query.php";
            require_once "./scripts/queries.php";
        ?>
    </head>
    <body>
        <header>
            <h1>Baza zawodników SKS</h1>
        </header>
        <nav>
            <button id="readEdit">Odczyt i edycja</button>
            <button id="add">Dodawanie</button>
        </nav>
        <?php
            $connection_read = new Connection("readWorker");
            $connection_write = new Connection("editWorker");
            $players = Query::noParams($connection_read->getPDO(),$queries["allUsers"]);
        ?>
        <main>
            <div id="readEdit">
                <table id="users">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>imię</th>
                            <th>nazwisko</th>
                            <th>klasa</th>
                            <th>rok urodzenia</th>
                            <th>wzrost</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                while ($row = $players->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['imie']."</td>";
                                    echo "<td>".$row['nazwisko']."</td>";
                                    echo "<td>".$row['klasa']."</td>";
                                    echo "<td>".$row['rokurodzenia']."</td>";
                                    echo "<td>".$row['wzrost']."</td>";
                                    echo "<form method='POST' class='edit'>";
                                    echo "<input type='hidden' name='id' value='".$row['id']."'>";
                                    echo "<td><button type='submit' name='edit' value='edit'>edytuj</button></td>";
                                    echo "<td><button type='submit' name='delete' value='delete'>usuń</button></td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                            ?>
                    </tbody>
                </table>
                <div id="editPopupOverlay"></div>
                <div id="editPopup"></div>
            </div>
            <div id="add">
                            <h3>Dodawanie zawodnika</h3>
                            <form method='POST' id='add'>
                            <label for="imie">Imię</label><br />
                            <input type="text" id="imie" name="imie"><br />
                            <label for="nazwisko">Nazwisko</label><br />
                            <input type="text" id="nazwisko" name="nazwisko"><br />
                            <label for="klasa">Klasa</label><br />
                            <input type="number" id="klasa" name="klasa"><br />
                            <label for="rok_urodzenia">Rok urodzenia</label><br />
                            <input type="number" id="rok_urodzenia" name="rok_urodzenia"><br />
                            <label for="wzrost">Wzrost</label><br />
                            <input type="number" id="wzrost" name="wzrost"><br />
                            <button type='submit' name='update' value='Zapisz'>Zapisz</button>
                            </form>
            </div>
        </main>
        <?php 
            $connection_read -> close();
            $connection_write -> close();
        ?>
        <script src="./scripts/script.js"></script>
    </body>
</html>