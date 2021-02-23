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

class Address
{

    public $id;
    public $user_id;
    public $street;
    public $city;
    public $cap;

    public function __construct($id, $user_id, $street, $city, $cap)
    {
        $this->id = (int)$id;
        $this->nome = $user_id;
        $this->cognome = $street;
        $this->email = $city;
        $this->user_type_id = $cap;
    }
}

class UserManager2 extends DBManager
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'user';
        $this->columns = ['id', 'nome', 'cognome', 'email', 'password', 'user_type_id'];
    }

    public function deleteFaq($id)
    {
        $this->delete_faq($id);
    }

    public function addToFaq($title, $text)
    {
        $resultSet = $this->db->execute("INSERT INTO faq (title, text) VALUES ('$title', '$text')");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito questa FAQ');
        }
        return array('error' => '');
    }

    public function getFaq()
    {
        $sql = "SELECT * FROM faq";
        return $this->db->query($sql);
    }

    public function getFaqById($id)
    {
        $sql = "SELECT * FROM faq WHERE id = $id";
        return $this->db->query($sql);
    }

    public function updateFaq($id, $title, $text)
    {
        return $this->db->execute("UPDATE faq SET title = '$title', text = '$text' WHERE id = $id");
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

    public function deleteMessage($id)
    {
        $this->delete_msg($id);
    }

    public function deleteAnswer($id)
    {
        $this->delete_answer($id);
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

    public function getMessage($id)
    {
        $sql = "SELECT * FROM contact_us WHERE id = $id";
        return $this->db->query($sql);
    }

    public function addToContactUs($nome, $cognome, $email, $msg, $userId)
    {
        $resultSet = $this->db->execute("INSERT INTO contact_us (nome, cognome, email, msg, user_id) VALUES ('$nome', '$cognome', '$email', '$msg', $userId)");
        if (!$resultSet) {
            return array('error' => 'Hai già inivato il messaggio');
        }
        return array('error' => '');
    }

    public function getCurrentContactUs()
    {
        $sql = "SELECT nome, cognome, email, msg, user_id, contact_us.id AS msg_id FROM contact_us";
        return $this->db->query($sql);
    }

    public function addToAnswer($msg, $userId, $contacUsId)
    {
        $resultSet = $this->db->execute("INSERT INTO answer (msg, user_id, contact_us_id) VALUES ('$msg', $userId, $contacUsId)");
        if (!$resultSet) {
            return array('error' => 'Hai già inivato il messaggio');
        }
        return array('error' => '');
    }

    public function getCurrentUserAnswer($userId)
    {
        $sql = "SELECT * FROM answer WHERE user_id = $userId";
        return $this->db->query($sql);
    }

    public function getAddress($userId)
    {
        $sql = "SELECT * FROM address WHERE user_id = $userId";
        return $this->db->query($sql);
    }

    public function updateAddress($userId, $street, $city, $cap)
    {
        return $this->db->execute("UPDATE address SET street = '$street', city = '$city', cap = '$cap' WHERE user_id = $userId");
    }

    public function updateUser($userId, $nome, $cognome, $email)
    {
        return $this->db->execute("UPDATE user SET nome = '$nome', cognome = '$cognome', email = '$email' WHERE id = $userId");
    }

    public function addToNewletter($email)
    {
        $resultSet = $this->db->execute("INSERT INTO newsletter (email) VALUES ('$email')");
        if (!$resultSet) {
            return array('error' => '');
        }
        return array('error' => '');
    }

    public function initializePoints($userId)
    {
        $this->db->execute("INSERT INTO points (user_id, total) VALUES ($userId, 0)");
    }

    public function createAddress($userId, $street, $city, $cap)
    {
        $query = "SELECT count(1) as has_address FROM address WHERE user_id = $userId";
        $result = $this->db->query($query);

        if ($result[0]['has_address'] > 0) {
            $this->db->execute("UPDATE address SET street = '$street', city = '$city', cap = '$cap' WHERE user_id = $userId");
        } else {
            $this->db->execute("INSERT INTO address (user_id, street, city, cap) VALUES ($userId, '$street', '$city', '$cap' )");
        }
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
