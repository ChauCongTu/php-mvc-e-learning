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
        return 'user_id';
    }
    public function getList()
    {
    }
    public function accountVerification($username, $password)
    {
        $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = hash('sha256', $password);
        $data = $this->db->table($this->_table)->where('username', '=', $username)->where('password', '=', $password)->first();
        return $data;
    }

    public function getUserByID($user_id)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = $this->db->table($this->_table)->where('user_id', '=', $user_id)->first();
        return $data;
    }
    public function FindUsers($name)
    {
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = $this->db->table($this->_table)->whereLike('name', $name)->first();
        return $data;
    }
    public function getUsers()
    {
        $data = $this->db->table($this->_table)->get();
        return $data;
    }
    public function activeUser($user_id)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_NUMBER_INT);
        $data = array(
            'active' => 1
        );
        $result = $this->db->table($this->_table)->where('user_id', '=', $user_id)->update($data);
        if ($result)
            return true;
        return false;
    }
    public function createAccount($username, $password, $email, $name)
    {
        if ($username == null || $password == null || $email == null || $name == null) {
            return false;
        } else {
            $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
            $password = hash('sha256', $password);
            $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
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
