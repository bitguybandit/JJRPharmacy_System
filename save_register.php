<?php
$conn = mysqli_connect("localhost", "root", "", "jjrmeditrack_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$username  = $_POST['username'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$role      = $_POST['role'] ?? 'patient';
$bdate     = $_POST['bdate'];
$address   = $_POST['address'];
$gender    = $_POST['gender'];
$contact   = $_POST['contactnumber'];

// ✅ hash password properly
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// insert into users table
$sql = "INSERT INTO users (firstname, lastname, username, email, password, role)
        VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword', '$role')";

if (mysqli_query($conn, $sql)) {
    $userID = mysqli_insert_id($conn);

    // ✅ only insert staff details if role is staff
    if ($role == 'staff') {
    mysqli_query($conn, "INSERT INTO staff (userID, bdate, address, gender, contactnumber)
                         VALUES ('$userID', '$bdate', '$address', '$gender', '$contact')");
}


    echo "<script>alert('Registration successful! Please login.'); window.location='login.html';</script>";
} else {
    echo "<script>alert('Error during registration'); window.location='register.html';</script>";
}

mysqli_close($conn);
?>
