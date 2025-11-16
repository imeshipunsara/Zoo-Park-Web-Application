<?php
require_once __DIR__ . '/../db-conn.php';

require_once __DIR__ . '/../my_exception.php';

class Admin
{
    private $id;
    private $username;
    private $password_enc;

    public function set_username($username)
    {
        $this->username = $username;
    }

    public function get_admin_id()
    {
        return $this->id;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function set_password($password)
    {
        $data_hash = md5($password);
        $this->password_enc = $data_hash;
    }

    public function print_admin()
    {
        echo "Admin ID: " . $this->id . "<br>";
        echo "Admin Username: " . $this->username . "<br>";
        echo "Admin Password: " . $this->password_enc . "<br>";
    }
    public function get_admin_by_username($username)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM admins WHERE username = :x";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':x', $username);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row) {
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->password_enc = $row['password_enc'];
            } else {
                return null;
            }
            // connection close
            $conn = null;

            return $this;
        } catch (Exception $ex) {
            throw $ex;
        }

    }
    // save admin in the database
    public function save_admin()
    {
        try {

            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "INSERT INTO admins (username, password_enc) VALUES (:username, :password_enc)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password_enc', $this->password_enc);

            // execute the query
            $stmt->execute();

            // connection close
            $conn = null;
            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // admin login 
    // find admin by username 
    // if exists, check password  
    public function login($username, $password)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $found = $this->get_admin_by_username($username);

            if ($found == null) {
                throw new MyException("Error: username or password not valid");
            }

            $input_password_hash = md5($password);

            // if password hash is not equal to the password hash in the database,
            // throw an exception
            if ($found->password_enc != $input_password_hash) {
                throw new MyException("Error: username or password not valid");
            }

            // connection close
            $conn = null;

            return $found;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>