<?php
//SEE ON TEST FAIL
class Page
{
    private $db;
    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addUser(){
        $this->db->query('INSERT INTO users SET name=:name, email=:email, status=:status');
        $values = array(
            'name' => 'test',
            'email' => 'test@host.loc',
            'status' => 'user'
        );
        foreach ($values as $param=>$value){
            $this->db->bind($param, $value);
        }
        $this->db->execute();
    }
}