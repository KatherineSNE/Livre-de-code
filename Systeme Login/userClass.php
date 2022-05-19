<?php

class User {
    private $id_user;
    private $name_user;
    private $surname_user;
    private $email_user;
    private $password_user;
    
    
public function getId(){
   return $this->id_user;
    }
    
public function setId($newId){
    $this->id_user=$newId;
    }
public function getName(){
    return $this->name_user;
}

public function setName($newName){
    $this->name_user=$newName;
}

public function getSurname(){
    return $this->surname_user;
}

public function setSurname($newSurname){
    $this->surname_user = $newSurname;
}

public function getEmail(){
    return $this->email_user;
}

public function setEmail($newEmail){
    $this->email_user = $newEmail;
}

public function getPassword(){
    return $this->password_user;
}

public function setPassword($newPassword){
    $this->password_user = $newPassword;
}

public function createUser($bdd){
    try{
        $req = $bdd->prepare('INSERT INTO user(name_user, surname_user, email_user, password_user)
        VALUES(:name_user, :surname_user, :email_user, :password_user)');
        $req->execute(array(':name_user'=>$this->name_user,
                            ':surname_user'=>$this->surname_user,
                            ':email_user'=>$this->email_user,
                            ':password_user'=>$this->password_user
                            ));
                        }
    catch(exception $e){
        die('error:'.$e->getMessage());
    }
}


 public function userExist($bdd){
        $check = $bdd->prepare('SELECT * FROM user WHERE email_user = :email_user');
        $check->execute(array(
                             ':email_user'=>$this->getEmail()   
                             ));
        $result=$check->fetch();

        if($result){
            echo'user already exists';
            return false;
        }
        else{
            return true;
        }
    }
    
public function getUserByMail($bdd){
    try{
        $req = $bdd->prepare('SELECT * FROM user WHERE email_user = :email_user');
        $req->execute(array(
        'email_user'=>$this->email_user,
        ));
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;   
    }
    catch(Exception $e){
        die('error'.$e->getMessage());
    }
}

public function updateUser($bdd){
    try{
    $change=$bdd->prepare('UPDATE user SET
                        name_user = :name_user,
                        surname-user = :surname_user,
                        email_user = :email_user,
                        password_user = :password_user,
                        WHERE id_user = :id_user');
        $change->execute(array(
                        'id_user'=>$this->id_user,
                        ':name_user'=>$this->name_user,
                        ':surname_user'=>$this->surname_user,
                        ':email_user'=>$this->email_user,
                        ':password_user'=>$this->password_user
                        ));
    }
    catch(Exception $e){
         die('error'.$e->getMessage());
    }
}

}



    






?>