<?php
require_once 'user.php';
class connection
{

    public PDO $pdo;

    public function __construct()
    {

        $dsn = 'mysql:dbname=devlab-back;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $this->pdo = new PDO($dsn, $user, $password);


    }

    public function insert(user $user)
    {
        $query = 'INSERT INTO user (email , password , 
                  first_name , last_name)
                  values (:email , :password , 
                          :first_name , :last_name
                  )';

        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'email' => $user->email,
            'password' => md5($user->password . 'my_super_salt'),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name

        ]);
    }



    public function getAllUserFirstLastName(): array
    {
        $query = 'Select first_name , last_name FROM user 
                  ';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    }


    public function getAllUserData(): array
    {
        $query = 'Select * FROM user 
                  ';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
        return ($datas);

    }




    // NEW CODE

    public function connexion(string $email, string $password): array
    {

        $query = 'Select * FROM user where email = :email AND password = :password
                  ';
        $statement = $this->pdo->prepare($query);
        $statement->execute([
                'email' => $email,
                'password' => md5($password . 'my_super_salt')
            ]


        );
        $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
        return ($datas[0]);


    }


    public function getAllUserId(): array
    {
        $query = 'SELECT id from `user` ';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    }
}
