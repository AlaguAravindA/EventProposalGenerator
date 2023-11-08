<!DOCTYPE html>
<html>
<head>
    <title>Event Permission Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px #ccc;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
        }

        .requester-info {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Event Permission Request</h1>
        <div id="eventDetails"></div>

        </div>
    </div>


    
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Process form data
        $eventCategory = $_POST["eventCategory"];
        $firstName = $_POST["firstName"];
        $surname = $_POST["surname"];
    
        // Perform necessary actions and generate a response
        $response = "Form data received: Event Category - $eventCategory, First Name - $firstName, Last Name - $surname";
    
        // Send the response back to the AJAX request
        echo $response;
    } else {
        echo "Invalid request method.";
    }
    ?>
    
    
</body>
</html>
