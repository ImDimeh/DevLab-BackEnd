<?php
require_once 'user.php';
require_once 'db_connection.php';
class DaoUser
{
    public ConnectionBDD $condb;

    public function __construct($con){
        $this->condb = $con;
    }

    public function insert(User $user)
    {
        $query = 'INSERT INTO user (email , password , firstname , lastname) values (:email , :password , :firstname , :lastname)';
        $statement = $this->condb->pdo->prepare($query);

        $statement->execute([
            'email' => $user->email,
            'password' => md5($user->password . 'my_super_salt'),
            'firstname' => $user->firstname,
            'lastname' => $user->lastname
        ]);

        return $this->condb->pdo->lastInsertId();
    }

    public function read(User $user)
    {
        $query = 'SELECT id, lastname, firstname, email, password FROM user WHERE email = :email AND password = :password';
        $statement =  $this->condb->pdo->prepare($query);
        $statement->execute([
                'email' => $user->email,
                'password' => md5($user->password . 'my_super_salt')
            ]
        );
        $users = $statement->fetchAll(PDO::FETCH_CLASS, "User");
        if($users != null) {
            return ($users[0]);
        }else{
            return null;
        }
    }
}

?>