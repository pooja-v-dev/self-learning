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
  <div id="header_data" >
    <h2 id="priBtn">Request Dataset</h2>
    <a href="/request_list/createNewRequest.php"><button id="secBtn">Create New Request</button></a>
  </div>
  <?php include_once 'dbConnection.php';

  $sql = "CREATE TABLE IF NOT EXISTS `test`.`request` ( `idrequest` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT, `title` VARCHAR(64) NOT NULL, `category` VARCHAR(30) NULL DEFAULT NULL, `initiator` VARCHAR(12) NOT NULL,`initiatoremail` VARCHAR(64) NOT NULL, `assignee` VARCHAR(64) NULL DEFAULT NULL, `priority` ENUM('HIGH','NORMAL','LOW') NULL DEFAULT 'NORMAL', `requeststatus` ENUM('CREATED','ASSIGNED','CLOSED') NOT NULL DEFAULT 'CREATED', `closed` DATETIME NULL DEFAULT NULL, `created` DATETIME NOT NULL, PRIMARY KEY (`idrequest`), UNIQUE INDEX `idrequest_UNIQUE` (`idrequest` ASC))";
  $result = $conn->query($sql);

  $sql = "SELECT *  FROM test.request";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) { ?>

    <table>
      <tr>
        <th>Request</th>
        <th>Title</th>
        <th>Category</th>
        <th>Initiator</th>
        <th>Initiator Email</th>
        <th>Assignee</th>
        <th>Priority</th>
        <th>Request status</th>
        <th>Closed</th>
        <th>Created</th>
        <th>Change Status</th>

        <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row["idrequest"]; ?></td>
        <td><?php echo $row["title"]; ?></td>
        <td><?php echo $row["category"]; ?></td>
        <td><?php echo $row["initiator"]; ?></td>
        <td><?php echo $row["initiatoremail"]; ?></td>
        <td><?php echo $row["assignee"]; ?></td>
        <td><?php echo $row["priority"]; ?></td>
        <td><?php echo $row["requeststatus"]; ?></td>
        <td><?php echo $row["closed"]; ?></td>
        <td><?php echo $row["created"]; ?></td>
        <td><select name='status' class='myDropDown'>
            <option value="<?php echo $row['idrequest'] ?>|'CREATED'" <?php if ($row['requeststatus'] == 'CREATED') echo 'selected' ?>>Created</option>
            <option value="<?php echo $row['idrequest'] ?>|'ASSIGNED'" <?php if ($row['requeststatus'] == 'ASSIGNED') echo 'selected' ?>>Assigned</option>
            <option value="<?php echo $row['idrequest'] ?>|'CLOSED'" <?php if ($row['requeststatus'] == 'CLOSED') echo 'selected' ?>>Closed</option>

      </tr>
  <?php }
        echo "</table>";
      } else {
        echo "No results";
      }

  ?>

</body>

</html>