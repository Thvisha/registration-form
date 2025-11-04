<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration_db";
$port = 3307; // use your MySQL port (important!)

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
  die("<h3>Database Connection Failed: " . $conn->connect_error . "</h3>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $course = $_POST['course'];
  $mobile = $_POST['mobile'];

  $sql = "INSERT INTO registrations (fullname, dob, email, gender, course, mobile)
          VALUES ('$fullname', '$dob', '$email', '$gender', '$course', '$mobile')";

  if ($conn->query($sql) === TRUE) {
    echo "
    <html>
    <head>
      <title>Application Submitted</title>
      <style>
        body {
          background: linear-gradient(135deg, #00b09b, #96c93d);
          font-family: 'Poppins', sans-serif;
          display: flex;
          align-items: center;
          justify-content: center;
          height: 100vh;
          margin: 0;
          color: #333;
        }
        .success-box {
          background: #fff;
          padding: 30px 50px;
          border-radius: 15px;
          box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
          width: 400px;
          text-align: center;
          animation: fadeIn 0.8s ease;
        }
        h2 {
          color: #28a745;
          margin-bottom: 10px;
        }
        h3 {
          color: #333;
          margin-bottom: 20px;
        }
        .details {
          text-align: left;
          background: #f9f9f9;
          padding: 15px;
          border-radius: 10px;
        }
        .details p {
          margin: 8px 0;
          font-size: 16px;
        }
        button {
          margin-top: 20px;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          background-color: #28a745;
          color: white;
          font-size: 16px;
          cursor: pointer;
          transition: 0.3s;
        }
        button:hover {
          background-color: #218838;
        }
        @keyframes fadeIn {
          from {opacity: 0; transform: translateY(20px);}
          to {opacity: 1; transform: translateY(0);}
        }
      </style>
    </head>
    <body>
      <div class='success-box'>
        <h2>✅ Application Submitted Successfully!</h2>
        <h3>Details Entered:</h3>
        <div class='details'>
          <p><b>Full Name:</b> $fullname</p>
          <p><b>Date of Birth:</b> $dob</p>
          <p><b>Email:</b> $email</p>
          <p><b>Gender:</b> $gender</p>
          <p><b>Course:</b> $course</p>
          <p><b>Mobile:</b> $mobile</p>
        </div>
        <button onclick='window.location.href=\"index.html\"'>Back to Form</button>
      </div>
    </body>
    </html>";
  } else {
    echo "<h3>Error: " . $conn->error . "</h3>";
  }
}

$conn->close();
?>
