<?php

final class model_home extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function checkInput($form){
        $errors=[];
        $formToken=$form['token'];

        if(Model::tokenGet($formToken)){             //csrf token controll
            if(empty($form["firstname"])){
                $errors['firstnameEmpty']="Geben Sie eine Vorname ein";
            }else{
                $firstname=$this->validate($form["firstname"]);
                if(!preg_match('/^[A-Za-z]+$/',$firstname)){
                    $errors['firstnameInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["lastname"])){
                $errors['lastnameEmpty']="Geben Sie eine Nachname ein";
            }else{
                $lastname=$this->validate($form["lastname"]);
                if(!preg_match('/^[A-Za-z]+$/',$lastname)){
                    $errors['lastnameInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["city"])){
                $errors['cityEmpty']="Geben Sie ein Stadt ein";
            }else{
                $city=$this->validate($form["city"]);
                if(!preg_match('/^[A-Za-z]+$/',$city)){
                    $errors['cityInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["address"])){
                $errors['addressEmpty']="Geben Sie eine Adresse ein";
            }else{
                $address=$this->validate($form["address"]);
                if(!preg_match('/^[A-Za-z0-9_.]+$/',$address)){
                    $errors['addressInvalid']="Geben Sie gültige Zeichen ein";
                }
            }

            if(empty($form["email"])){
                $errors['emailEmpty']="Geben Sie eine E-Mail-Adresse ein";
            }else{
                $email=$this->validateEmail($form["email"]);
                if($this->validateEmail($email)){
                    $errors['emailInvalid']="Geben Sie gültige Email ein";
                }
            }

            if(empty($form["phone"])){
                $errors['phoneEmpty']="Geben Sie Eine Telefon Nummer ein";
            }else{
                $phone=$this->validate($form["phone"]);
                if(!preg_match('/^[0-9]+$/',$phone)){
                    $errors['phoneInvalid']="Geben Sie gültige Zeichen ein (0-9)";
                }
            }

            $sql="SELECT * FROM addressbook_tbl WHERE email=?";
            $email=$form["email"];                          //check if email not exists
            $values=[$email];
            if($this->doExists($sql,$values)){
                $errors['emailExists']="E-Mail-Adresse wird bereits verwendet";
            }

        }
        return $errors;
    }

    public function putPerson($form){
        $firstname=$form["firstname"];
        $lastname=$form["lastname"];
        $city=$form["city"];
        $address=$form["address"];
        $mail=$form["email"];
        $phone=$form["phone"];

        $form=[$firstname,$lastname,$city,$address,$mail,$phone];
        $sql="INSERT INTO addressbook_tbl (firstname,lastname,city,address,email,telefon) VALUES (?,?,?,?,?,?)";
        $this->doQuery($sql,$form);
        return true;
    }

    public function getPersonInfo()
    {
        $sql="SELECT * FROM addressbook_tbl";
        $userInfo=$this->doSelect($sql);
        if(isset($userInfo)){
            return $userInfo;
        }
    }

    public function columSort($id)
    {
        switch ($id){
            case "firstname":
                $sql="SELECT * FROM addressbook_tbl ORDER BY firstname ";
            break;
            case "lastname":
                $sql="SELECT * FROM addressbook_tbl ORDER BY lastname ";
                break;
            case "city":
                $sql="SELECT * FROM addressbook_tbl ORDER BY city ";
                break;
            case "address":
                $sql="SELECT * FROM addressbook_tbl ORDER BY address ";
                break;
            case "email":
                $sql="SELECT * FROM addressbook_tbl ORDER BY email ";
                break;
            case "telefon":
                $sql="SELECT * FROM addressbook_tbl ORDER BY telefon ";
                break;
        }

        $userInfo=$this->doSelect($sql);
        if(isset($userInfo)){
            return $userInfo;
        }
    }

    public function personDelete($id)
    {
        $sql="DELETE FROM addressbook_tbl WHERE id=?;";
        $value=[$id];
        $alert=$this->doDelete($sql,$value);
        if($alert){
            return "delete erfolgreich";
        }else{
            return "error";
        }
    }

}


?>