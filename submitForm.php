
  <?php
    include_once 'dbConnection.php';
    $title = "";
    $category = "";
    $initiator = "";
    $initiatoremail = "";
    $assignee = "";
    $priority = "";
    $requeststatus = "";
    $closed = "";

    if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $valid = true;

        if (empty($_POST["title"])) {
            $titleErr = "Title is required";
            $valid = false;
        } else {
            $title = test_input($_POST["title"]);
        }
        if (empty($_POST["category"])) {
            $categoryErr = "Category is required";
            $valid = false;
        } else {
            $category = test_input($_POST["category"]);
        }
        if (empty($_POST["initiator"])) {
            $initiatorErr = "Initiator is required";
            $valid = false;
        } else {
            $initiator = test_input($_POST["initiator"]);
        }
        if (empty($_POST["initiatoremail"])) {
            $initiatoremailErr = "Initiator Email is required";
            $valid = false;
        } else {
            $initiatoremail = test_input($_POST["initiatoremail"]);
        }
        if (empty($_POST["assignee"])) {
            $assigneeErr = "Assignee is required";
            $valid = false;
        } else {
            $assignee = test_input($_POST["assignee"]);
        }
        if (empty($_POST["priority"])) {
            $priorityErr = "Priority is required";
            $valid = false;
        } else {
            $priority = test_input($_POST["priority"]);
        }
        if (empty($_POST["requeststatus"])) {
            $requeststatusErr = "Request Status is required";
            $valid = false;
        } else {
            $requeststatus = test_input($_POST["requeststatus"]);
        }
        if (empty($_POST["closed"])) {
            $closedErr = "Closed is required";
            $valid = false;
        } else {
            $closed = test_input($_POST["closed"]);
        }
        if ($valid == true) {

            $sql = "INSERT INTO test.request(idrequest,title, category, initiator, initiatoremail, assignee, priority, requeststatus, closed) VALUES (NULL,'$title', '$category', '$initiator', '$initiatoremail', '$assignee', '$priority', '$requeststatus', '$closed');";
            $result = $conn->query($sql);
            // include('test.php');
            // print_r($result);
            // echo "<h2>From submitted successfully!!!</h2>";
            header("Location: /request_list/requestList.php");
            exit;
        } else {
            include('createNewRequest.php');
        }
        unset($_POST);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>