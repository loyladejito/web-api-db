<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <?php
          $conn=mysqli_connect('localhost','root','','my_employee') or die(mysqli_connect_error($conn));
          $query = "SELECT * FROM emp_data";
          $result = $conn->query($query);
          $empData = array();
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $empData[] = $row;
          }
      }
      echo json_encode($empData);
    ?>
</body>
</html>