<?php
session_start();
require_once "config/functions.php";
$conn = new Functions();
//if(isset($_SESSION["user"]) or isset($_SESSION["admin"]))
    //header("Location:index.php");

$str = $_REQUEST["str"];

    if($str == "insert"){
        $msg = $conn->insertData($_REQUEST["firstName"],$_REQUEST["lastName"],$_REQUEST["contactNumber"],$_REQUEST["flatNumber"],$_REQUEST["address"],$_REQUEST["email"],$_REQUEST["password"]);
        if (isset($msg)) {
            echo json_encode(array("statusCode" => 200, "msg" => $msg));
        }else{
            echo json_encode(array("statusCode" => 201, "msg" => $msg));
        }
    }

    if($str == "check"){
        $msg = $conn->checkEmail($_REQUEST["email"]);
        if (isset($msg)) {
            echo json_encode(array("statusCode" => 200, "msg" => $msg));
        }else{
            echo json_encode(array("statusCode" => 201, "msg" => $msg));
        }
    }

    if($str == "login"){
        $msg = $conn->checkEmailAndPassword($_REQUEST["email"],$_REQUEST["password"]);
        if ($msg) {
            echo json_encode(array("statusCode" => 200, "msg" => "Login Successfully!"));
        }else{
            echo json_encode(array("statusCode" => 201, "msg" => "Login Failed!"));
        }
    }

    if($str == "get"){
        $msg = $conn->getData($_REQUEST["email"]);
        if (isset($msg)) {
            echo json_encode(array("statusCode" => 200, "msg" => $msg[0]));
        }
    }

    if($str == "insert_report"){
        $msg = $conn->insertReportIssuesData($_REQUEST["email"],$_REQUEST["name"],$_REQUEST["contact"],$_REQUEST["flat"],$_REQUEST["title"],$_REQUEST["desc"],$_REQUEST["email"]);
        if (isset($msg)) {
            echo json_encode(array("statusCode" => 200, "msg" => $msg));
        }else{
            echo json_encode(array("statusCode" => 201, "msg" => $msg));
        }
    }

    if($str == "get_report"){
        $msg = $conn->getReportIssuesData($_REQUEST["email"]);
        $val = "";
        $i = 1;
        foreach ($msg as $value){

            if($_REQUEST["email"] == ""){
                $ch = $value["status"];
                $open = ($ch == "open") ? "selected" : '';
                $progress = ($ch == "progress") ? "selected" : '';
                $resolve = ($ch == "resolve") ? "selected" : '';
                $val .= "<tr>
                        <td>".$i++."</td>
                        <td>".$value['name']."</td>
                        <td>".$value['contact']."</td>
                        <td>".$value['flat']."</td>
                        <td>".$value['title']."</td>
                        <td>".$value['description']."</td>
                        <td>".strtoupper($value['status'])."</td>
                        <td>
                            <select class='btn btn-primary' name='".$value['id']."'  onchange='updateStatus(this.value,this.name)'>
                                <option value='open' ".$open.">Open</option>
                                <option value='progress'  ".$progress.">In Progress</option>
                                <option value='resolve'  ".$resolve.">Resolve</option>    
                            </select>
                        </td>
                        <td><button name='feedback' value='".$value["id"]."' class='btn btn-warning feedback'>Feedback</button></td>
                      </tr>";
            }else if(is_numeric($_REQUEST["email"])) {
                $val = $msg[0];
            }else{
                $val .= "<tr>
                        <td>".$i++."</td>
                        <td>".$value['name']."</td>
                        <td>".$value['contact']."</td>
                        <td>".$value['flat']."</td>
                        <td>".$value['title']."</td>
                        <td>".$value['description']."</td>
                        <td>".strtoupper($value['status'])."</td>
                      </tr>";
            }
        }
        if (isset($msg)) {
            echo json_encode(array("statusCode" => 200, "msg" => $val));
        }
    }

    if($str == "updateStatus"){
        $msg1 = $conn->updateReportStatus($_REQUEST["status"],$_REQUEST["id"]);
        if (isset($msg1)) {
            echo json_encode(array("statusCode" => 200, "msg" => $msg1));
        }else{
            echo json_encode(array("statusCode" => 201, "msg" => $msg1));
        }
    }