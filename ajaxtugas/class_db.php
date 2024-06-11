<?php
class database {
    private $con;
    public $host = "localhost";
    public $db = "tgs_01ajax";
    public $user = "root";
    public $passwd = "";

    function __construct(){
        $this->start_con();
    }

    function start_con(){
        $this->con = new mysqli($this->host, $this->user, $this->passwd, $this->db);
        if ($this->con->connect_error) {
            die('tidak bisa konek local mysql server: ' . $this->con->connect_error);
        }
    }

    function close_con(){
        return $this->con->close();
    }

    function sqlquery($sql){
        return $this->con->query($sql);
    }

    function jumrec($sql){
        $hasil = $this->sqlquery($sql);
        return $hasil ? $hasil->num_rows : 0;
    }

    function datasql($sql){
        $data = array();
        $hasil = $this->sqlquery($sql);
        if ($hasil) {
            $data = $hasil->fetch_array(MYSQLI_BOTH);
        }
        return $data;
    }

    function fetchdata($sql){
        $res = array();
        $hasil = $this->sqlquery($sql);
        if ($hasil) {
            while ($data = $hasil->fetch_array(MYSQLI_BOTH)) {
                $res[] = $data;
            }
        }
        return $res;
    }
}
?>
