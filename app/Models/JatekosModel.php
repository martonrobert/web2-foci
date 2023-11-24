<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class JatekosModel {

    protected $db;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }


    public function getJatekosLista($klubId = 0) {

        $params = array();
        $sql = 'select l.*, k.csapatnev, p.nev as poszt_nev 
                from labdarugo l
                join klub k on k.id = l.klubid
                join poszt p on p.id = l.posztid';

        if ((int) $klubId > 1) {
            $sql .= ' where k.id = ?';
            $params[] = (int) $klubId;
        }

        $sql .= ' order by l.mezszam';

        log_message('error', $sql);

        return $this->db->query($sql, $params)->getResult();
    }


}