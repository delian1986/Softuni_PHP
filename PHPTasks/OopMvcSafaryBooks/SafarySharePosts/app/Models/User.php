<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login($email, $password)
    {
        $qry = 'SELECT id,name,email,password AS hashPassword FROM USERS WHERE email=:email';
        $this->db->query($qry);
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashedPass = $row->hashPassword;
        if (password_verify($password, $hashedPass)) {
            return $row;
        }
        //TODO NEED REFACTOR
        return false;

    }

    public function register($data): bool
    {
        $qry = 'INSERT INTO users (name, email, password) VALUES (:name,:email,:password)';
        $this->db->query($qry);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        return $this->db->execute();
    }

    public function findUserByEmail(string $email): bool
    {
        $qry = 'SELECT * FROM users WHERE email=:email';
        $this->db->query($qry);
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        return $this->db->rowCount() > 0;

    }
}