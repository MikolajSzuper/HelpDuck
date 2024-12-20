<?php
class Database {
    private $mysqli; // uchwyt do BD

    public function __construct() {
        if ($this->mysqli === null) {
            $config = require __DIR__ . '/../../config/database.php';
            $this->mysqli = new mysqli(
                $config['host'],
                $config['user'],
                $config['password'],
                $config['database']
            );

            // sprawdź połączenie
            if ($this->mysqli->connect_errno) {
                printf("Nie udało się połączenie z serwerem: %s\n", $this->mysqli->connect_error);
                exit();
            }

            // zmień kodowanie na utf8
            if ($this->mysqli->set_charset("utf8")) {
                // udało się zmienić kodowanie
            }
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $pola) {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola); // ile pól
            $ile = $result->num_rows; // ile wierszy
            // pętla po wyniku zapytania $results
            $tresc .= "<table><tbody>";
            while ($row = $result->fetch_object()) {
                $tresc .= "<tr>";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "<td>" . $row->$p . "</td>";
                }
                $tresc .= "</tr>";
            }
            $tresc .= "</table></tbody>";
        }
        return $tresc;
    }

    public function selectUser($login, $password, $tabela) {
        // parametry $login, $passwd , $tabela – nazwa tabeli z użytkownikami
        // wynik – id użytkownika lub -1 jeśli dane logowania nie są poprawne
        $id = -1;
        $sql = "SELECT * FROM $tabela WHERE login='$login'";
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            if ($ile == 1) {
                $row = $result->fetch_object(); // pobierz rekord z użytkownikiem
                $hash = $row->password; // pobierz zahaszowane hasło użytkownika
                // sprawdź czy pobrane hasło pasuje do tego z tabeli bazy danych:
                if (password_verify($password, $hash)) {
                    $id = $row->id; // jeśli hasła się zgadzają - pobierz id użytkownika
                }
            }
        }
        return $id; // id zalogowanego użytkownika(>0) lub -1
    }
   
  /* public function selectOnlyresult($sql, $pola) {
     $tresc = "";
     if ($result = $this->mysqli->query($sql)) {
        $ilepol = count($pola); //ile pól
        $ile = $result->num_rows; //ile wierszy
        // pętla po wyniku zapytania $results
        while ($row = $result->fetch_object()) {
        for ($i = 0; $i < $ilepol; $i++) {
        $p = $pola[$i];
       $tresc.=$row->$p;
        }
        }
        $result->close(); 
        }
        return $tresc;
    }*/
public function selectOnlyresult($sql) {
    $tresc = "";
    if ($result = $this->mysqli->query($sql)) {
        if ($row = $result->fetch_row()) {
            $tresc = $row[0]; // zakładamy, że zapytanie zwraca tylko jedną kolumnę
        }
        $result->close(); // zwolnij pamięć
    }
    return $tresc;
}

public function selectOnlyresultTable($sql) {
    $results = [];
    if ($result = $this->mysqli->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        $result->close(); // zwolnij pamięć
    }
    return $results;
}
   
   public function delete($sql){
     if( $this->mysqli->query($sql)) return true; else return false;
   }
   
   public function insert($sql) {
      if( $this->mysqli->query($sql)) return true; else return false;
       }
   
   public function getMysqli() {
      return $this->mysqli;
       }
}
?>