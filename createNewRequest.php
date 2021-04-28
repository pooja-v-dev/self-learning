<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="test.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once 'dbConnection.php'; ?>
    <div>
        <h2 id="priBtn">Create a new request</h2>
        <a href="/request_list/requestList.php"><button id="secBtn">Request List</button></a>
    </div>

    <form method="post" action="submitForm.php" id="formSubmit">
        <label for="title">Title :</label><br>
        <input type="text" name="title" id="title" value="<?php echo isset($title)? $title: ''; ?>"/>
        <span class="error"><?php echo $titleErr; ?></span>
        <br><br>


        <label for="category">Category :</label><br>
        <input type="text" name="category" id="category" value="<?php echo isset($category)? $category: ''; ?>"/>
        <span class="error"><?php echo $categoryErr; ?></span>
        <br><br>

        <label for="initiator">Initiator :</label><br>
        <input type="text" name="initiator" id="initiator"  value="<?php echo isset($initiator)? $initiator: ''; ?>"/>
        <span class="error"><?php echo $initiatorErr; ?></span>
        <br><br>

        <label for="initiatoremail">Initiator Email :</label><br>
        <input type="text" name="initiatoremail" id="initiatoremail" value="<?php echo isset($initiatoremail)? $initiatoremail: ''; ?>"/>
        <span class="error"><?php echo $initiatoremailErr; ?></span>
        <br><br>

        <label for="assignee">Assignee :</label><br>
        <input type="text" name="assignee" id="assignee" value="<?php echo isset($assignee)? $assignee: ''; ?>"/>
        <span class="error"><?php echo $assigneeErr; ?></span>
        <br><br>

        <label for="priority">Priority :</label><br>
        <select name="priority" id="priority">
            <option value="HIGH">HIGH</option>
            <option value="NORMAL">NORMAL</option>
            <option value="LOW">LOW</option>
        </select>
        <span class="error"><?php echo $priorityErr; ?></span>
        <br><br>

        <label for="requeststatus">Request Status :</label><br>
        <select name="requeststatus" id="requeststatus">
            <option value="CREATED">CREATED</option>
            <option value="ASSIGNED">ASSIGNED</option>
            <option value="CLOSED">CLOSED</option>
        </select>
        <span class="error"><?php echo $requeststatusErr; ?></span>
        <br><br>

        <label for="closed">Closed Date</label><br>
        <input type="text" name="closed" id="closed" value="<?php echo isset($closed)? $closed: ''; ?>"/>
        <span class="error"><?php echo $closedErr; ?></span>
        <br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>