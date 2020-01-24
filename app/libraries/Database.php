<?php
//see on see fail sellest kuidas ma saan ABga sooritada t88d

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;


// Database constructor

public function __construct()
{
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    try {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error . '<br>';
    }
}
//p@ringu ettevalmistus, prepare element
public function query(){
    $this->stmt = $this->dbh->prepare($sql);
}

//nyyd peame panema v@@rtused ehk v@ljund

public function bind($param, $value, $type=null){
    if(is_null($type)){
//        peab tegema valiku...
        switch (true){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
    }
    $this->stmt->bindValue($param, $value, $type);
}

    public function execute(){
        $this->stmt->execute();
    }

    public function getAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
}