
<?php include("dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cool Checkboxes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      /* text-align: center; */
    }

    .checkbox-group {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
    }

    input[type="checkbox"] {
      appearance: none;
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      border: 2px solid #3498db;
      border-radius: 3px;
      outline: none;
      cursor: pointer;
    }

    input[type="checkbox"]:checked {
      background-color: #3498db;
    }

    .btn-submit {
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #2980b9;
    }
  </style>



</head>
<body>
  <div class="form-container">
    <h2>Filter by options</h2>
    <form action="value.php" method="POST" >
      <div class="checkbox-group" >
      <label><input type="checkbox" name="select_all" id="select-all"  > Select All</label><br>
    <label><input type="checkbox" name="checkbox[]" value="firstname" required> First</label><br>
    <label><input type="checkbox" name="checkbox[]" value="lastname"> last</label><br>
    <label><input type="checkbox" name="checkbox[]" value="dateofevent"> date</label><br>
    <label><input type="checkbox" name="checkbox[]" value="address"> Address</label><br>
      </div>
      <br>
      <button type="submit" class="btn btn-success" name="register">Submit</button>
      <a href="home1.php" class="btn btn-success">BACK</a>
    </form>
  </div>
  <p hidden> </p>
</body>
<script>
    document.getElementById('select-all').addEventListener('change', function() {
        var checkboxes = document.getElementsByName('checkbox[]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });
</script>
</html>



  
