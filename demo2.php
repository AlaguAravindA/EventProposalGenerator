<!DOCTYPE html>
<html>
<head>
    <title>PDF Page</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 100%;
            padding: 0;
            margin: 0;
        }
        .page {
            width: 100%;
            height: 29.7cm;
            padding: 1.5cm; /* Adjust as needed */
            margin: 0 auto;
            background-color: white;
        }
        .ms-5 {
            margin-left: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
            font-size: 17px;
        }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>
<?php
session_start(); // Start or resume the session
include('dbconnect.php');

if (isset($_POST['register'])) {
    $_SESSION['firstName'] = $_POST['firstName']; // Store the input in the session variable
    $_SESSION['EOfirstName'] = $_POST['EOfirstName']; // Store the input in the session variable
    $_SESSION['EOsurname'] = $_POST['EOsurname'];
    $_SESSION['EOemail'] = $_POST['EOemail'];
    $_SESSION['phnumber'] = $_POST['phnumber'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['resemail'] = $_POST['resemail'];
    $_SESSION['dateOfEvent'] = $_POST['dateOfEvent'];
    $_SESSION['eventCategory'] = $_POST['eventCategory'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['Descrip'] = $_POST['Descrip'];
    $_SESSION['Company_Name'] = $_POST['Company_Name'];
    

    $query = "INSERT INTO event_details (firstname, lastname,resemail,resphnumber, dateofevent,event_type,address,company_name,EOfirstName,EOlastName,EOemail,created_at,Descrip) VALUES (?, ?,?,?,?, ?, ?, ?, ?,?,?,CURRENT_TIMESTAMP,?)";
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $_SESSION['firstName'], $_SESSION['surname'], $_SESSION['resemail'], $_SESSION['phnumber'], $_SESSION['dateOfEvent'], $_SESSION['eventCategory'], $_SESSION['address'], $_SESSION['Company_Name'], $_SESSION['EOfirstName'], $_SESSION['EOsurname'], $_SESSION['EOemail'], $_SESSION['Descrip']);
        $result = mysqli_stmt_execute($stmt);
        
       

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
}

?>

<form action="demo.php" method="post">
<div class="container">
        <div class="page">
            <img class="ms-5" src="logo-grade-kce-2.png" alt="Logo">
            <h1><u>Event-Title</u></h1>
            <div class="table-container">
                <table >

                    <tr>
                        <th>Organizing Department:</th>
                        <td>CSE</td>
                    </tr>
                    <tr>
                        <th>Date of Event</th>
                        <td><?php echo isset($_SESSION['dateOfEvent']) ? $_SESSION['dateOfEvent'] : ''; ?></td>
                    </tr>
                    <tr>
                        <th>Event For</th>
                        <td>Students</td>
                    </tr>
                    <tr>
                        <th>Event type</th>
                        <td><?php echo isset($_SESSION['eventCategory']) ? $_SESSION['eventCategory'] : ''; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
  
<div class="container">
    <h1><u>Resource Person</u></h1> <br>
    <table>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone number</th>
        </tr>
        <tr>
            <td><?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '';?> &nbsp; <?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : '';  ?> </td>
            <td><?php echo isset($_SESSION['Company_Name']) ? $_SESSION['Company_Name'] : ''; ?></td>
<td><?php echo isset($_SESSION['resemail']) ? $_SESSION['resemail'] : ''; ?></td>
<td><?php echo isset($_SESSION['phnumber']) ? $_SESSION['phnumber'] : ''; ?></td>

        </tr>
        
    </table>



</div>
    
<br>

<div class="container">
    <h1><u>Involved Staffs</u></h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
        </tr>
        <tr>
            <td><?php echo isset($_SESSION['EOfirstName']) ? $_SESSION['EOfirstName'] : '' ." ". (isset($_SESSION['EOlastName']) ? $_SESSION['EOlastName'] : 'No data found')  ?> </td>
            <td>Coordinator</td>
            <td><?php echo isset($_SESSION['EOemail']) ? $_SESSION['EOemail'] : ''; ?></td>
        </tr>
    </table>




</div>
<div class="container">
    <h3>Outcomes</h3>
    <p><?php echo isset($_SESSION['Descrip']) ? $_SESSION['Descrip'] : ''; ?></p>
</div>
    <!-- Add similar lines for other session variables (dateOfEvent, eventCategory, address) if needed -->
</form>

    

    <p style="margin-top: 130px;">Signature</p>
    
    

</body>
<?php include('email_temp.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
