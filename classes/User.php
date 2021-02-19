<?php

class User
{

    public $id;
    public $nome;
    public $cognome;
    public $email;
    public $user_type_id;

    public function __construct($id, $nome, $cognome, $email, $user_type_id)
    {
        $this->id = (int)$id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->user_type_id = $user_type_id;
    }

    public static function generatePassword()
    {
        //return substr(md5(mt_rand()), 0, 20);
        return 'test123';
    }
}

class UserManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'user';
        $this->columns = ['id', 'nome', 'cognome', 'email', 'password', 'user_type_id'];
    }

    // publics Method
    public function passwordMatch($password, $confirm_password)
    {
        return $password == $confirm_password;
    }

    public function register($nome, $cognome, $email, $password)
    {

        $result = $this->db->query("SELECT * FROM user WHERE email = '$email'");
        if (count($result) > 0) {
            return false;
        }

        $userId = $this->create([
            'nome' => $nome,
            'cognome' => $cognome,
            'email' => $email,
            'password' => md5($password),
            'user_type_id' => 2
        ]);

        return $userId;
    }

    public function login($email, $password)
    {

        $result = $this->db->query(
            "SELECT * 
        FROM user
        WHERE email = '$email'
        AND password = MD5('$password');
        "
        );

        if (count($result) > 0) {
            $user = (object) $result[0];

            $this->_setUser($user);
            return true;
        }

        return false;
    }

    // private Methods
    private function _setUser($user)
    {

        $userToStore = (object) [
            'id' => $user->id,
            'email' => $user->email,
            'is_admin' => $user->user_type_id == 1
        ];
        $_SESSION['user'] = $userToStore;
    }
}
