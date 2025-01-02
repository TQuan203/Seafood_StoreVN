<?php


class User
{
    public $Id;
    public $Username;
    public $Email;
    public $Password;
    public $Fullname;
    public $Image;
    public $Role;

    public function RetrieveRequestParam()
    {
        $user = filter_input(INPUT_POST, 'username');
        $pass = filter_input(INPUT_POST, 'password');
        $this->Username = filter_input(INPUT_POST, 'username');
        $this->Email = filter_input(INPUT_POST, 'email');
        $this->Password = $pass;
        $this->Fullname = filter_input(INPUT_POST, 'fullname');
        if($_FILES['file']['name'] != null || isset($_FILES['file']['name'])){
            $this->Image = $_FILES['file']['name'];
        }else{
            $this->Image = filter_input(INPUT_POST, 'image');
        }

        $this->Role = filter_input(INPUT_POST, 'role');

        $id =  filter_input(INPUT_POST, 'id');

        if ($id != null) $this->Id = $id;
    }
}