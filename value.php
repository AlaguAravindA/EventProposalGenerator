<!DOCTYPE html>
<html>
<head>
    <title>Table Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand mx-auto" href="home1.php">MCEM-KCE</a>
        <img src="logo-ftr.png" alt="Event App Logo" class="logo-img">
    </div>
</nav>
<?php
include('dbconnect.php');

// Step 2: Process selected checkboxes and construct the SQL query dynamically
if (isset($_POST['register'])) {
    $selectedColumns = $_POST['checkbox'];

    // Construct a comma-separated list of selected columns
    $selectedCols = implode(", ", $selectedColumns);

    // Fetch data from the database based on selected columns
    $sql = "SELECT $selectedCols FROM event_details";
    $result = $con->query($sql);

    // Step 3: Display fetched data as a Bootstrap-styled table
    if ($result->num_rows > 0) {
        echo '<div class="container mt-5" >';
        echo '<table class="table table-striped table-bordered table-hover">';
        echo '<thead class="thead-dark"><tr>';

        // Output table header
        foreach ($selectedColumns as $col) {
            echo "<th scope='col'>" . $col . "</th>";
        }
        echo '</tr></thead>';

        // Output table data rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($selectedColumns as $col) {
                echo "<td>" . htmlspecialchars($row[$col]) . "</td>";
            }
            echo "</tr>";
        }

        echo '</table>';
        echo '<a href="display.php"><button class="btn btn-success">More filter</button></a>';
        echo '<a href="home1.php" class="btn btn-success" style="margin-left:700px">BACK</a>';
        echo '</div>';
    } else {
        echo "No data found.";
    }
} else {
    echo "No checkboxes selected.";
}

// Close the database connection
$con->close();
?>

<!-- Add Bootstrap JS and jQuery (optional but recommended) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
