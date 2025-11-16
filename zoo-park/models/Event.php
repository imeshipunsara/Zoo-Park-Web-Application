<?php
require_once __DIR__ . '/../db-conn.php';

require_once __DIR__ . '/../my_exception.php';

class Event
{
    private $id;
    private $name;
    private $event_image;
    private $event_text;
    private $event_datetime;

    // set event name
    public function set_name($name)
    {
        $this->name = $name;
    }

    // set event image
    public function set_event_image($event_image)
    {
        $this->event_image = $event_image;
    }

    // set event text
    public function set_event_text($event_text)
    {
        $this->event_text = $event_text;
    }

    // set event datetime
    public function set_event_datetime($event_datetime)
    {
        $this->event_datetime = $event_datetime;
    }

    // get event id
    public function get_event_id()
    {
        return $this->id;
    }

    // get event name
    public function get_name()
    {
        return $this->name;
    }

    // get event image
    public function get_event_image()
    {
        return $this->event_image;
    }

    // get event text
    public function get_event_text()
    {
        return $this->event_text;
    }
    public function get_short_text_from_event_text()
    {
        if (strlen($this->event_text) > 200) {
            return substr($this->event_text, 0, 200) . '...';
        } else {
            return $this->event_text;
        }
    }

    public function get_event_datetime()
    {
        return $this->event_datetime;
    }

    // create new event
    public function create_event()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "INSERT INTO events (name,event_text, event_datetime, event_image) VALUES (:name, :event_text, :event_datetime, :event_image)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':event_text', $this->event_text);
            $stmt->bindParam(':event_datetime', $this->event_datetime);
            $stmt->bindParam(':event_image', $this->event_image);
            $stmt->execute();

            // connection close
            $conn = null;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }

    }

    //update event 
    public function update_event()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "UPDATE events SET name = :name, event_text = :event_text, event_datetime = :event_datetime, event_image = :event_image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':event_text', $this->event_text);
            $stmt->bindParam(':event_datetime', $this->event_datetime);
            $stmt->bindParam(':event_image', $this->event_image);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();

            // connection close
            $conn = null;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }

    }

    // get upcomming events 
    public function get_upcomming_events()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM events WHERE event_datetime > NOW()";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $events = array();
            foreach ($rows as $row) {
                $event = new Event();
                $event->id = $row['id'];
                $event->name = $row['name'];
                $event->event_image = $row['event_image'];
                $event->event_text = $row['event_text'];
                $event->event_datetime = $row['event_datetime'];
                array_push($events, $event);
            }

            // connection close
            $conn = null;

            return $events;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // delete event by id
    public function delete_event_by_id($id)
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "DELETE FROM events WHERE id = :id";
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


    // get all events
    public function get_all_events()
    {
        try {
            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM events ORDER BY event_datetime DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $events = array();
            foreach ($rows as $row) {
                $event = new Event();
                $event->id = $row['id'];
                $event->name = $row['name'];
                $event->event_image = $row['event_image'];
                $event->event_text = $row['event_text'];
                $event->event_datetime = $row['event_datetime'];
                array_push($events, $event);
            }

            // connection close
            $conn = null;

            return $events;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function get_event_by_id($event_id)
    {
        try {

            // create new db connection object
            $conn = DBConnection::GetConnection();

            $sql = "SELECT * FROM events WHERE id = :x";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':x', $event_id);
            $stmt->execute();
            $row = $stmt->fetch();
            if ($row) {
                $event = new Event();
                $event->id = $row['id'];
                $event->name = $row['name'];
                $event->event_image = $row['event_image'];
                $event->event_text = $row['event_text'];
                $event->event_datetime = $row['event_datetime'];

                // connection close
                $conn = null;

                return $event;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw $ex;
        }

    }
}