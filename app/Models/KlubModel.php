<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class KlubModel {

    protected $db;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }

    public function getKlubLista() {
        $stmt = $this->db->query('select * from klub where id > 1 order by csapatnev');   
        return $stmt->getResult();
    }


}