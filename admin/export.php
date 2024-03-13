<?php

include('../includes/dbconn.php');
// SQL query to select data from your table
$tblemployees = 'finaloutput';

$sql = "SELECT * FROM tblemployees";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Define a filename for the CSV file
    $filename = "exported_data.csv";

    // Set appropriate headers for the CSV file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Open a writable stream to the output buffer
    $output = fopen('php://output', 'w');

    // Add a header row to the CSV file
    $header = array("id","EmpId","FirstName","LastName","EmailId","Password","Gender","Dob", "Department");
    // Replace with your actual column names

    // ,"Address","City","Country","Phonenumber","aadhar","pan","caste","subcaste","ssc","hsc","grad","phd","RegDate"

// id	
// EmpId	
// FirstName	
// LastName	
// EmailId	
// Password	
// Gender	
// Dob	
// Department	
// Address	
// City	
// Country	
// Phonenumber	
// aadhar	
// pan	
// caste	
// subcaste	
// user_type	
// ssc	
// hsc	
// grad	
// phd	
// publication	
// journal	
// patent	
// award	
// Status	
// RegDate
    fputcsv($output, $header);

    // Loop through the result set and add data to the CSV file
    while ($row = $result->fetch_assoc()) {
        $data = array($row['id'], $row['EmpId'],$row['FirstName'],$row['LastName'],$row['EmailId'],$row['Password'],$row['Gender'],$row['Dob'],$row['Department']); // Replace with your actual column names
        fputcsv($output, $data);
    }

    // Close the output stream
    fclose($output);
} else {
    echo "<script>
    alert('No Data Found');
    window.location.href = 'dashboard.php'; 
    </script>";
}

// Close the database connection
$conn->close();
?>