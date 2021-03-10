<?php

class Functions
{
    private $conn;
    private $users;
    private $issue_reports;


    function __construct()
    {
        require_once "connection.php";
        $db = new connection();
        $this->conn = $db->DBConnect();
        $this->users = "users";
        $this->issue_reports = "issue_reports";
    }

    function insertData($fname, $lname, $contact, $flat, $address, $email, $password)
    {
        try {
            $this->createTable();
            $dataQuery = "INSERT INTO $this->users( first_name, last_name, contact,flat_number,address,email,password) VALUES (:fname,:lname,:contact,:flat,:address,:email,:password)";

            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":fname", $fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":contact", $contact);
            $stmt->bindParam(":flat", $flat);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $pass);
            $stmt->execute();


            if (isset($stmt)) {
                $this->checkEmailAndPassword($email, $password);
                $msg = "Registration successfully!";
            } else {
                $msg = "Registration Failed!";
            }
            return $msg;
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function createTable()
    {

        $createTable = "
                CREATE TABLE IF NOT EXISTS users(
                    id int primary key AUTO_INCREMENT,
                    first_name varchar(25) not null,
                    last_name varchar(6) not null,
                    contact varchar(10) not null,
                    flat_number varchar(5) not null,
                    address varchar(255) not null,
                    email varchar(50) not null,
                    password char(60) not null
                )
                ";

        if ($this->conn->exec($createTable)) {
            echo "<script>console.log(" . json_encode('Table Created', JSON_HEX_TAG) . ")</script>";
        }
    }

    function getData($id)
    {
        if ($id == "") {
            $getData = "Select * from $this->users";
        } else {
            $getData = "Select * from $this->users where email=:id";
        }
        $stmt = $this->conn->prepare($getData);
        if (isset($id))
            $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function deleteData($id)
    {

        $deleteData = "delete from $this->users where id=:id";
        $stmt = $this->conn->prepare($deleteData);
        $stmt->bindParam(":id", $id);
        $msg = "Data Not Deleted";
        if ($stmt->execute())
            $msg = "Data Deleted Successfully";
        return $msg;
    }

    function checkEmail($email)
    {

        $this->createTable();
        $checkEmail = "select * from $this->users where email=:email";
        $stmt = $this->conn->prepare($checkEmail);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetchAll();
        return $stmt->rowCount();

    }

    function checkEmailAndPassword($email, $password)
    {
        if ($email == "admin" && $password == "admin") {
            $_SESSION["admin"] = $email;
            $_SESSION["admin_name"] = $email;
            return true;
        } else {
            $checkEmail = "select id,first_name,last_name,email,password from $this->users where email=:email";
            $stmt = $this->conn->prepare($checkEmail);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = $stmt->fetch();
            if (isset($password) && isset($val['password'])) {
                if (password_verify($password, $val['password']) && $email == $val["email"]) {
                    $_SESSION["user"] = $email;
                    $_SESSION["user_name"] = $val["first_name"];
                    return true;
                }
            }
            return false;
        }
    }


    function createReportIssuesTable()
    {
        try {
            $createReportIssuesTable = "
                CREATE TABLE IF NOT EXISTS $this->issue_reports(
                    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `email` varchar(25) NOT NULL,
                    `name` varchar(255) NOT NULL,
                    `contact` varchar(10) NOT NULL,
                    `flat` varchar(5) NOT NULL ,
                    `title` varchar(255)  NULL,
                    `description` text NOT NULL,
                    `status` varchar(10) NOT NULL default 'open',
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                     FOREIGN KEY (`email`) REFERENCES $this->users (`email`) ON DELETE CASCADE ON UPDATE NO ACTION
                );
                    ";

            if ($this->conn->exec($createReportIssuesTable)) {
                echo "<script>console.log(" . json_encode('Report Issues Table Created', JSON_HEX_TAG) . ")</script>";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }

    }

    function insertReportIssuesData($email, $name, $contact, $flat, $title, $desc, $img = "")
    {
        try {
            $this->createReportIssuesTable();
            $dataQuery = "INSERT INTO $this->issue_reports  ( email,name,contact,flat,title,description,created_at) VALUES (:email,:name,:contact,:flat,:title,:desc,:created)";


            $stmt = $this->conn->prepare($dataQuery);

            $t = time();
            date_default_timezone_set("Asia/Kolkata");
            $create = date("Y-m-d H:i:s", $t);
            $stmt->bindParam(":created", $create);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":contact", $contact);
            $stmt->bindParam(":flat", $flat);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":desc", $desc);

            $stmt->execute();
            if (isset($stmt)) {
                $msg = "Your Complaint is Submitted Successfully";
            } else {
                $msg = "Your Complaint Submitting is Failed";
            }
            return $msg;
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function getReportIssuesData($id)
    {
        try {
            if ($id == "") {
                $getBlogData = "select * from $this->issue_reports";
            } else if(is_numeric($id)){
                $getBlogData = "select * from $this->issue_reports where id=:email";
            }
            else {
                $getBlogData = "select * from $this->issue_reports where email=:email";
            }
            $stmt = $this->conn->prepare($getBlogData);
            if ($id != "") {
                $stmt->bindParam(":email", $id);
            }
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function updateReportStatus($status, $id)
    {

        try {
            $getBlogData = "update $this->issue_reports set status=:status where id=:id";
            $stmt1 = $this->conn->prepare($getBlogData);
            $stmt1->bindParam(":status", $status);
            $stmt1->bindParam(":id", $id);
            $stmt1->execute();
            if (isset($stmt1)) {
                $msg1 = "Status Updated Successfully";
            } else {
                $msg1 = "Something is wrong to update status";
            }
            return $msg1;
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }


}