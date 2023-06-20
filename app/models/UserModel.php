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
    public function sendReport($title, $type, $content, $user_id, $reported_user_id) {
        $title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = [
            'title' => $title,
            'type' => $type,
            'content' => $content,
            'user_id' => $user_id,
            'reported_user_id' => $reported_user_id
        ];
        $this->db->table('report')->insert($data);
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
    public function editAccount($user_id, $name, $gender, $birthday, $phone_number, $address, $link, $description, $role)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_ENCODED);
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_var($gender, FILTER_SANITIZE_NUMBER_INT);
        $birthday = filter_var($birthday, FILTER_SANITIZE_SPECIAL_CHARS);
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS);
        $link = filter_var($link, FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
        $role = filter_var($role, FILTER_SANITIZE_NUMBER_INT);
        $data = ([
            'name' => $name,
            'gender' => $gender,
            'birthday' => $birthday,
            'phone_number' => $phone_number,
            'address' => $address,
            'link' => $link,
            'description' => $description,
            'role' => $role
        ]);
        $result = $this->db->table($this->_table)->where('user_id', '=', $user_id)->update($data);
        if ($result)
            return true;
        return false;
    }
    public function banUser($user_id)
    {
        $data = array(
            'role' => -1
        );
        $result = $this->db->table($this->_table)->where('user_id', '=', $user_id)->update($data);
        if ($result)
            return true;
        return false;
    }
    public function deleteUser($user_id)
    {
        $result = $this->db->table($this->_table)->where('user_id', '=', $user_id)->delete();
        if ($result)
            return true;
        return false;
    }
    public function unbanUser($user_id)
    {
        $data = array(
            'role' => 0
        );
        $result = $this->db->table($this->_table)->where('user_id', '=', $user_id)->update($data);
        if ($result)
            return true;
        return false;
    }
}
