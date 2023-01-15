<?php
class DatabaseHelper
{
    private $db;
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " .$this->db->connect_error);
        } else {
            $this->db->set_charset("utf8");
        }
    }

    public function executeQuery($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getWeeklyPrincipleID()
    {
        return $this->executeQuery("SELECT * FROM WeeklyPrinciples WHERE Week=WEEK(CURRENT_DATE-1) ORDER BY Week DESC LIMIT 1");
    }

    public function generateWeeklyPrinciple()
    {
        $Principle = $this->executeQuery("SELECT ID FROM Principles ORDER BY RAND() LIMIT 1");
        mysqli_query($this->db, "INSERT INTO `WeeklyPrinciples` (`Week`, `PrincipleID`) VALUES (WEEK(CURRENT_DATE-1), ".$Principle[0]['ID'].")");
    }

    public function getPrincipleFromID($id)
    {
        return $this->executeQuery("SELECT * FROM Principles WHERE ID=$id");
    }

    public function getNotionsFromPrincipleID($id)
    {
        return $this->executeQuery("SELECT * FROM Notions WHERE PrincipleID=$id");
    }



}
?>