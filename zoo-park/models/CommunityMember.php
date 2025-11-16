<?php
require_once __DIR__ . '/../db-conn.php';

require_once __DIR__ . '/../my_exception.php';

class CommunityMember
{
    private $id;
    private $email;
    private $first_name;
    private $last_name;
    private $contact_number;
    private $gender;
    private $age;
    private $aproval;
    private $password_enc;
    private $registered_date;

    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_first_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function set_last_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function set_contact_number($contact_number)
    {
        $this->contact_number = $contact_number;
    }

    public function set_gender($gender)
    {
        $this->gender = $gender;
    }
    public function set_age($age)
    {
        $this->age = $age;
    }

    public function set_password($password)
    {
        $data_hash = md5($password);
        $this->password_enc = $data_hash;
    }

    public function get_id()
    {
        return $this->id;
    }


    public function get_email()
    {
        return $this->email;
    }

    public function get_first_name()
    {
        return $this->first_name;
    }


    public function get_last_name()
    {
        return $this->last_name;
    }

    public function get_contact_number()
    {
        return $this->contact_number;
    }
    public function get_gender()
    {
        return $this->gender;
    }

    public function get_age()
    {
        return $this->age;
    }

    public function get_aproval()
    {
        return $this->aproval;
    }


    public function get_member_by_email($email)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $member = new CommunityMember();

            $sql = "SELECT * FROM community_members WHERE email = :x";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':x', $email);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row) {
                $member->id = $row['id'];
                $member->first_name = $row['first_name'];
                $member->last_name = $row['last_name'];
                $member->contact_number = $row['contact_number'];
                $member->gender = $row['gender'];
                $member->age = $row['age'];
                $member->email = $row['email'];
                $member->aproval = $row['aproval'];
                $member->password_enc = $row['password_enc'];
                $member->registered_date = $row['registered_date'];
            } else {
                return null;
            }
            // connection close
            $conn = null;

            return $member;
        } catch (Exception $ex) {
            throw $ex;
        }

    }
    // register community member in the database
    public function register()
    {
        try {

            // create new db connection object
            $conn = DBConnection::GetConnection();

            // check if email already exists
            $found = $this->get_member_by_email($this->email);

            if ($found != null) {
                throw new MyException("Error: email already exists");
            }

            $sql = "INSERT INTO community_members (first_name, last_name, contact_number, gender, age, email,password_enc) ";
            $sql = $sql . " VALUES (:first_name, :last_name, :contact_number, :gender, :age, :email, :password_enc)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':contact_number', $this->contact_number);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':email', $this->email);
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

    public function login($email, $password)
    {
        try {
            $found = $this->get_member_by_email($email);

            if ($found == null) {
                throw new MyException("Error: email or password not valid");
            }

            $input_password_hash = md5($password);

            // if password hash is not equal to the password hash in the database,
            // throw an exception
            if ($found->password_enc != $input_password_hash) {
                throw new MyException("Error: email or password not valid");
            }

            if ($found->aproval != 'approved') {
                throw new MyException("Error: Your account is not approved yet");
            }

            return $found;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    //update community member aproval 
    public function aprove_member($member_id)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "UPDATE community_members SET aproval = 'approved' WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $member_id);
            $stmt->execute();

            // connection close
            $conn = null;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }

    }

    public function delete_by_id($id)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "DELETE FROM community_members WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // connection close
            $conn = null;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function get_all_members()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM community_members ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $members = array();
            foreach ($rows as $row) {
                $item = new CommunityMember();
                $item->id = $row['id'];
                $item->first_name = $row['first_name'];
                $item->last_name = $row['last_name'];
                $item->contact_number = $row['contact_number'];
                $item->gender = $row['gender'];
                $item->age = $row['age'];
                $item->email = $row['email'];
                $item->aproval = $row['aproval'];
                $item->password_enc = $row['password_enc'];
                $item->registered_date = $row['registered_date'];
                array_push($members, $item);
            }

            // connection close
            $conn = null;

            return $members;
        } catch (Exception $ex) {
            throw $ex;
        }
    }




}

?>