<?php
class UserModel extends Model
{
    private $_table = 'users';
    function tableFill()
    {
        return $this->_table;
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'home';
    }
    public function getList()
    {
        
    }
    public function createAccount($username, $password, $email, $name)
    {
        if ($username == null || $password == null || $email == null || $name == null) {
            return false;
        } else {
            $username = addslashes($username);
            $password = addslashes($password);
            $password = hash('sha256', $password);
            $email = addslashes($email);
            $name = addslashes($name);
            $data = ([
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'name' => $name
            ]);
            $result = $this->db->table($this->_table)->insert($data);
            if ($result)
                return true;
            return false;
        }
    }
}
