<?php
require(__DIR__ . "/conn.php");

class Theme{
    private $idTheme;
    private $nomTheme;

    public function __construct($idTheme = null, $nomTheme = null)
    {
        $this->idTheme = $idTheme;
        $this->nomTheme = $nomTheme;
    }

    public function getIdTheme()
    {
        return $this->idTheme;
    }

    public function setIdTheme($idTheme)
    {
        $this->idTheme = $idTheme;
    }

    public function getNomTheme()
    {
        return $this->nomTheme;
    }

    public function setNomTheme($nomTheme)
    {
        $this->nomTheme = $nomTheme;
    }

    public function showAll(){
        $conn = new PDO("mysql:host=localhost;dbname=aws", "root", "");

        $sql = "SELECT * FROM theme";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
}