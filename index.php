<?php include("dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event proposal generator</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styling */
        body {
            background-color: #f4f4f4;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        i{
            font-size: smaller;
            color: red;
        }
        .nav1{
            padding-left: "100px";
        }
    /* Define a class to style the <legend> tag */
    .legend-styled {
        position: relative; /* Enable relative positioning */
        display: inline-block;
    }

    /* Add a pseudo-element to create the line */
    .legend-styled::after {
        content: ''; /* Generate content for the pseudo-element */
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        border-bottom: 1px solid #000; /* Style the line */
    }


    </style>
    <!-- Include Google Fonts and Bootstrap JS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="logo-grade-kce-2.png" class="d-inline-block align-text-top" alt="" width="100px" height="50px">
<div class="container">
    <h6 class="navbar-brand mx-auto">MCEM</h6>

</div>
</nav>
    
    <div class="container mt-5 form-container">
    <h2>Event Proposal generator</h2>
    <form name="mailform" action="demo.php" method="post">
        <div class="form-group" required>
            <label for="eventCategory" required >Event Category:</label>
            <select class="form-control" name="eventCategory" required>
                <option value="Workshop">Workshop</option>
                <option value="Conference">Conference</option>
                <option value="Seminar">Seminar</option>
                <option value="Social">Social Event</option>
            </select>
        </div>
        <div>
        <div>

        <legend class="legend-styled">
            Coordinator's Details
          </legend> 
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="firstName">First Name:</label>
        <input type="text" class="form-control" name="EOfirstName" placeholder="Enter first name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="surname">LastName:</label>
        <input type="text" class="form-control" name="EOsurname" placeholder="Enter surname" required>
    </div>
</div>
    <div class="form-group">
        <label for="email">Email</label>
            <input type="email"  class="form-control"  name="EOemail" placeholder="Email of Coordinator" required>
        </label>
    </div>
</div>
<legend class="legend-styled">
            Resource Person's Details
          </legend> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" name="firstName" placeholder="Enter first name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="surname">LastName:</label>
                    <input type="text" class="form-control" name="surname" placeholder="Enter surname" required>
                </div>
            </div>
            <div class="form-group">
        <label for="resemail">Email</label>
            <input type="email" name="resemail"  class="form-control" placeholder="Email of Guest" required>
        </label>
    </div>
    <div class="form-group">
        <label for="phnumber">PhoneNumber</label>
            <input type="text" name="phnumber"  class="form-control" placeholder="Phonenumber of Guest" required>
        </label>
    </div>
           
        <div class="form-group">
            <label for="dateOfEvent">Date of Event:</label>
            <input type="date" class="form-control" name="dateOfEvent" required>
        </div>
        <div class="form-group ">
                    <label for="surname">Company Name:</label>
                    <input type="text" class="form-control" name="Company_Name" placeholder="Enter Company Name" required>
                </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Enter address" required></textarea>
        </div>
      <fieldset class='form-group'>

      <legend class="legend-styled">
            Event-Details
          </legend>
          <div class="form-group">
              <label for="Descrip">Outcome </label> <br>
              <i>in 100-150 words</i>
            <textarea class="form-control" name="Descrip" rows="3" placeholder="Enter Event Details" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-success btn-block" name="register" ">Submit</button>
    </form>
</div>

</body>
</html>



