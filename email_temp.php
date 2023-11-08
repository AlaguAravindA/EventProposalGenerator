<?php
 // Start the PHP session
include('dbconnect.php');


$query = 'SELECT * FROM event_details ORDER BY created_at DESC LIMIT 1';
$result = mysqli_query($con, $query);

if (!$result) {
    // Handle the SQL error and display an error message
    echo 'Error: ' . mysqli_error($con);
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['firstname'];
        $_SESSION['lastName'] = $row['lastname'];
        $_SESSION['dateOfEvent'] = $row['dateofevent'];
        $_SESSION['eventCategory'] = $row['event_type'];
        $_SESSION['EOemail'] = $row['EOemail'];
        $_SESSION['EOfirstname'] = $row['EOfirstName'];
        $_SESSION['EOlastname'] = $row['EOlastName'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['company_name'] = $row['Company_Name'];
        $_SESSION['Descrip'] = $row['Descrip'];
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$emails = array(
    'gdean6233@gmail.com',
    '717821p105@kce.ac.in',
    '717821p108@kce.ac.in'
  
);
foreach($emails as $email){


try {
    // Server settings
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'studypurpose886@gmail.com';
    $mail->Password = 'nvtzaqaqkfhnwqbe'; // App password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->addEmbeddedImage('logo-ftr.png','logo');
    // Recipients
    $mail->setFrom('sender@example.com', 'CSE Dept');
    $mail->addAddress($email,'Principal');
    
   
    

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Event Details';
    $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Event Details</title>
        </head>
        <body>
            <div style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
                <div style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px #ccc;">
                    <h1 style="color: #333;">Event Details</h1>
                    <tr><td colspan="2"><img src="cid:logo" ></td></tr>
                    <table style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Name</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['name']) ? $_SESSION['name'] : 'No data found') ." ". (isset($_SESSION['lastName']) ? $_SESSION['lastName'] : 'No data found') . '</td>
                        </tr>
                       
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Date of Event</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['dateOfEvent']) ? $_SESSION['dateOfEvent'] : 'No data found') . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Event Category</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['eventCategory']) ? $_SESSION['eventCategory'] : 'No data found') . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Address</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['address']) ? $_SESSION['address'] : 'No data found') . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Name of Coordinater</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['EOfirstname']) ? $_SESSION['EOfirstname'] : 'No data found') . " ". (isset($_SESSION['EOlastname']) ? $_SESSION['EOlastname'] : 'No data found') . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Email of Coordinater</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['EOemail']) ? $_SESSION['EOemail'] : 'No data found') . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong>Outcome</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">' . (isset($_SESSION['Descrip']) ? $_SESSION['Descrip'] : 'No data found') . '</td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="footer" style="background-color: #f4f4f4;padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #666;">
    This is an automated email. Please do not reply.
</div>
        </body>
        </html>';

    $mail->send();

} catch (Exception $e) {
    echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
}
}
?>
