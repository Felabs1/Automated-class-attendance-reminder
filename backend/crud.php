<?php

class Crud
{

    public $conn;

    public function __construct(string $server, string $user, string $password, string $database)
    {
        $this->conn = new mysqli($server, $user, $password, $database);
    }

    public function insert_data(string $table, array $array)
    {
        // $sql = "INSERT INTO demo(uname, pass, pass3) VALUES (?,?,?)";
        $sql = "";
        $vals = "";
        $literals = "";
        $literal_vals = "";
        $keys = array_keys($array);
        $values = array_values($array);

        for ($i = 0; $i < count($array); $i++) {
            $key = $keys[$i] . ",";
            $value = $values[$i] . ",";
            $sql .= $key;
            $literals .= "s";
            $literal_vals .= $value;
            $vals .= "?,";
        }

        $sql = rtrim($sql, ",");
        $vals = rtrim($vals, ",");
        $literal_vals = rtrim($literal_vals, ",");
        $literal_vals = explode(",", $literal_vals);
        // return $literal_vals;

        $test = array_values($array);
        // return $values[0];
        // return $vals;
        $test = extract($array);
        $sql = "INSERT INTO " . $table . "(" . $sql . ") VALUES(" . $vals . ")";
        $stmt = $this->conn->prepare($sql);
        extract($array);
        $stmt->bind_param($literals, ...$literal_vals);
        $result = $stmt->execute() or die($this->conn->error);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function fetch_data($sql)
    {
        $result = $this->conn->query($sql);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    public function update_data(string $table, array $array, array $conditions, string $bool = "NULL")
    {
        $sql = "";
        $where = "";
        $vals = "";
        $literals = "";
        $literal_vals = "";
        $keys = array_keys($array);
        $values = array_values($array);

        for ($i = 0; $i < count($array); $i++) {
            $key = $keys[$i] . " = ?,";
            $value = $values[$i] . ",";
            $sql .= $key;
            $literals .= "s";
            $literal_vals .= $value;
            // $where .= $condition;
            // $vals .= "?,";
        }

        $condition_keys = array_keys($conditions);
        $condition_vals = array_values($conditions);

        for ($j = 0; $j < count($conditions); $j++) {
            $condition = $condition_keys[$j] . " = ?,";
            $condition_val = $condition_vals[$j] . ",";
            $where .= $condition;
            $literals .= "s";
            $literal_vals .= $condition_val;
        }

        $literal_vals = rtrim($literal_vals, ",");
        $literal_vals = explode(",", $literal_vals);


        $sql = rtrim($sql, ",");
        $where = rtrim($where, ",");
        $sql = "UPDATE " . $table . " SET " . $sql . " WHERE " . $where;
        $stmt = $this->conn->prepare($sql);
        // return $sql;
        // // return $literals;
        $stmt->bind_param($literals, ...$literal_vals);
        $result = $stmt->execute() or die($this->conn->error);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    private function sanitize_filename($filename)
    {
        $filename = preg_replace("/[^\w\s\d\-_\.]/", '', $filename);
        return $filename;
    }

    private function generate_unique_filename($filename)
    {
        $uniqueFilename = uniqid() . '_' . $filename;
        return $uniqueFilename;
    }


    public function upload_file($file, $destination, $allowedExtensions = [], $maxFileSize = 0)
    {
        $uploadedFile = $_FILES[$file]['tmp_name'];
        $filename = $_FILES[$file]['name'];
        $fileType = $_FILES[$file]['type'];
        $fileSize = $_FILES[$file]['size'];

        // Validate file type
        if (!empty($allowedExtensions) && !in_array($fileType, $allowedExtensions)) {
            return 'Invalid file type';
        }

        // Validate file size
        if ($maxFileSize > 0 && $fileSize > $maxFileSize) {
            return 'File size exceeds the limit';
        }

        $targetPath = $destination . $filename;

        if (move_uploaded_file($uploadedFile, $targetPath)) {
            return $targetPath; // Return the original filename
        } else {
            return false;
        }
    }

    public function delete_data(string $query)
    {
        $result = $this->conn->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
}
?>