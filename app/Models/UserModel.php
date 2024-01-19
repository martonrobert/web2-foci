<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use App\Entities\User;

class UserModel {

    protected $db;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
        helper('text');
    }

    public function getUserList() {
        $stmt = $this->db->query('select * from felhasznalok where allapot = ?', array('A'));
        if ($stmt->getNumRows() > 0) {
            return $stmt->getResult();
        }
        return array();

    }

    public function createUserCode() {
        return random_string();
    }

    public function encodePwd($pwd, $code) {
        return hash('sha256', $pwd . $code);
    }

    public function findUserByEmail($email) {
        $stmt = $this->db->query('select * from felhasznalok where email = ?', array($email));
        if ($stmt->getNumRows() > 0) {
            return $stmt->getRow();
        }
        return null;
    }

    public function getUser($id) {
        $stmt = $this->db->query('select * from felhasznalok where id = ?', array((int) $id));
        if ($stmt->getNumRows() > 0) {
            return $stmt->getRow(0,'User');
        }
        return null;        
    }

    public function addUser(User $user) {
        $sql = 'insert into 
                    felhasznalok (
                    id, nev, adminisztrator, email, telefon, kod, 
                    jelszo, regisztracio, email_megerosítve, allapot)
                values
                    (?, ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?)';

        $this->db->query($sql, array(
            0,
            $user->nev,
            $user->adminisztrator,
            $user->email,
            $user->telefon,
            $user->kod,
            $user->jelszo,
            $user->regisztracio,
            $user->email_megerosítve,
            $user->allapot
        ));

        $user->id = (int) $this->db->insertID();

    }


    public function authenticateUser($email, $password) {

        $user = $this->findUserByEmail($email);
        if ($user == null) {
            throw new \Exception('Az e-mail cím nem található.');
        }
        log_message('error', print_r($user, true));

        $pwdEncoded = $this->encodePwd($password, $user->kod);
        log_message('error', $pwdEncoded . ' - ' . $user->jelszo);

        if ($user->jelszo !== $pwdEncoded) {
            throw new \Exception('Hibás e-mail cím vagy jelszó.');
        }

        return $user;
    }


    public function createUserToken($user) {
        $sql = 'insert into tokens (
                    id, 
                    felhasznalo_id, 
                    token_str, 
                    letrehozva, 
                    torolt
                    )
                values (
                    0, 
                    ?, 
                    uuid(), 
                    ?, 
                    0
                    )';

        $this->db->query($sql, array(
            (int) $user->id,
            date('Y-m-d H:i:s')
        ));
        
        $id = (int) $this->db->insertID();

        return $this->db->query('select * from tokens where id = ?', array($id))->getRow();

    }


    public function removeUserToken($token) {
        $row = $this->db->query('select * from tokens where token_str = ?', array($token))->getRow();
        if ($row) {
            $this->db->query('update tokens set torolt = 1 where id = ?', array((int) $row->id));
        }
    }
}
