<?php
require_once __DIR__ . '/../db-conn.php';
require_once __DIR__ . '/../my_exception.php';

class EdicationalInformation
{
    private $id;
    private $name;
    private $cover_image;
    private $information_text;

    public function get_information_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_cover_image()
    {
        return $this->cover_image;
    }

    public function get_information_text()
    {
        return $this->information_text;
    }

    public function get_short_text_from_information_text()
    {
        if (strlen($this->information_text) > 200) {
            return substr($this->information_text, 0, 200) . '...';
        } else {
            return $this->information_text;
        }
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_cover_image($cover_image)
    {
        $this->cover_image = $cover_image;
    }
    public function set_information_text($txt)
    {
        $this->information_text = $txt;
    }


    // create information
    public function create_information()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "INSERT INTO informations (name,information_text,cover_image) VALUES (:name, :information_text,:cover_image)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':information_text', $this->information_text);
            $stmt->bindParam(':cover_image', $this->cover_image);
            $stmt->execute();

            // connection close
            $conn = null;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // update information
    public function update_information()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "UPDATE informations SET name = :name, information_text = :information_text, cover_image = :cover_image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':information_text', $this->information_text);
            $stmt->bindParam(':cover_image', $this->cover_image);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();

            // connection close
            $conn = null;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }

    }

    // delete information by id
    public function delete_information_by_id($id)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "DELETE FROM informations WHERE id = :id";
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

    // get all information
    public function get_all_informations()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM informations ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $informations = array();
            foreach ($rows as $row) {
                $item = new EdicationalInformation();
                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->cover_image = $row['cover_image'];
                $item->information_text = $row['information_text'];
                array_push($informations, $item);
            }

            // connection close
            $conn = null;

            return $informations;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // get information by id
    public function get_information_by_id($id)
    {
        try {

            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM informations WHERE id = :x";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':x', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row) {
                $item = new EdicationalInformation();
                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->cover_image = $row['cover_image'];
                $item->information_text = $row['information_text'];

                // connection close
                $conn = null;

                return $item;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw $ex;
        }

    }


}