<?php

final class model_edit extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getPersonToUpdate($id)
    {
        $sql="SELECT * FROM addressbook_tbl WHERE id=?";
        $values=[$id];
        $userInfo=$this->doSelect($sql,$values);
//        if(isset($userInfo)){
//            return $userInfo;
//
        return $userInfo;
    }

    public function updatePerson($form,$id)
    {
        $firstname=$form["firstname"];
        $lastname=$form["lastname"];
        $city=$form["city"];
        $address=$form["address"];
        $mail=$form["email"];
        $phone=$form["phone"];

        $sql="UPDATE addressbook_tbl SET firstname=?,lastname=?,city=?,address=?,email=?,telefon=?  WHERE id=$id";
        $values=[$firstname,$lastname,$city,$address,$mail,$phone];
        $userInfo=$this->doUpdate($sql,$values);
//        if(isset($userInfo)){
//            return $userInfo;
//
        return $userInfo;
    }
}

?>