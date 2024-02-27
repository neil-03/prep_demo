<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $searchDate = $_POST["searchDate"];

    // Prepare and execute MySQL query
    $sql = "SELECT * FROM your_table_name WHERE date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Error Type: " . $row["error_type"] . "</p>";
            // Output other relevant columns as needed
        }
    } else {
        echo "No results found.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
