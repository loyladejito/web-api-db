<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$conn=mysqli_connect('localhost','root','','my_employee') or die(mysqli_connect_error($conn));

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $jobTitle = $_POST['jobTitle'];
        $url= $_POST['query'];
        $query = "INSERT INTO emp_data (name, address, contact, jobTitle)VALUES ('$name', '$address', '$contact', '$jobTitle')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Add Success";
            header("location:".$url);
        } else {
            echo "Error" . mysqli_error($conn);
        }
        $conn->close();
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $jobTitle=$_POST['jobTitle'];
        $url= $_POST['url'];
        $query = "UPDATE emp_data SET name='".$name."', address='".$address."', contact='".$contact."', jobTitle='".$jobTitle."' WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Update Success";
            header("location:".$url);
        } else {
            echo "Error" . mysqli_error($conn);
        }
        $conn->close();
    }


    if(isset($_GET['employee'])) {
        $query = "SELECT * FROM emp_data";
        $result = $conn->query($query);
        $empData = array();
          if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                    $empData[] = $row;
               }
          }
          echo json_encode($empData); 
     }

    if(isset($_POST['ID'])){
       $id=$_POST['ID'];
       $query = "DELETE FROM emp_data WHERE id=$id";
       $result = $conn->query($query);
       echo "deleted successfully!";
    }
?>
