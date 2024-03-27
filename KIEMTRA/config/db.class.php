<?php

class Db {
    protected static $connection;

    public function connection() {
        if (!isset(self::$connection)) {
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

            // Kiểm tra kết nối
            if (self::$connection->connect_error) {
                die("Kết nối đến CSDL thất bại: " . self::$connection->connect_error);
            }
        }
        
        return self::$connection;
    }

    public function query_execute($queryString) {
        $connection = $this->connection();
        $result = $connection->query($queryString);
        // Kiểm tra và trả về kết quả
        if ($result === false) {
            die("Lỗi truy vấn: " . $connection->error);
        }
        
        $connection->close();
        return $result;
    }

    public function escape_string($string) {
        $connection = $this->connection();
        return $connection->real_escape_string($string);
    }

    public function select_to_array($queryString) {
        $rows = array();
        $result = $this->query_execute($queryString);

        if ($result === false) {
            return false;
        }

        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        
        return $rows;
    }
}
?>
