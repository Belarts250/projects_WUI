<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form attributes</title>
    <style>
        .body {
            background-image: url(ii.jpg);
            padding: 500px;
        }
        .bo {
            width: 400px;
            height: 1000px;
            background-color: aqua;
            padding: 70px;
            border-radius: 50px;
        }
        .button {
            background-color: bisque;
            border-radius: 10px;
            height: 40px;
            width: auto;
        }
        .yut {
            width: 165px;
        }
    </style>
</head>
<body class="body">
<form action="homework.php" method="post" enctype="multipart/form-data">
    <fieldset class="bo">
        <legend><h1>Personal details</h1></legend>
        <div class="bi">
            Name:<br><input type="text" name="name" placeholder="Enter name" title="Please enter your username" required><br>
            Password:<br><input type="text" name="password" placeholder="Enter password" required><br>
            E-mail:<br><input type="email" name="email" placeholder="Enter email" required><br>
            Age:<br><input type="number" name="age" placeholder="Enter age" min="1" max="100" required><br>
            Contact:<br><input type="number" name="phone" placeholder="Enter number" min="9" max="10" class="yut" required><br>
            Gender:<br>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <br>Rate yourself in extracurricular activities:<br>
            <input type="range" name="activity"><br><br>

            <h2>Educational Qualification</h2><br>
            <input type="checkbox" name="primary"> Primary level<br>
            <input type="checkbox" name="secondary"> High school<br>
            <input type="checkbox" name="bach"> Bachelor<br>
            <input type="checkbox" name="masters"> Masters<br>
            <input type="checkbox" name="phd"> PhD<br>

            <h4>Add your reports here:</h4><br>
            <input type="file" name="file" title="Upload your reports here"><br>
            <h3>Address</h3>
            <textarea name="address"></textarea><br>
        </div>
        <p>I do accept the <a href="#">Terms and Conditions</a> of your site.</p><br>
        <a href="./ouput.php"><button type="submit">Submit</button></a>
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $tel = $_POST['phone'];
    $gender = $_POST['gender'];
    $activity = $_POST['activity'];
    $primary = isset($_POST['primary']) ? 'Yes' : 'No';
    $sec = isset($_POST['secondary']) ? 'Yes' : 'No';
    $bach = isset($_POST['bach']) ? 'Yes' : 'No';
    $masters = isset($_POST['masters']) ? 'Yes' : 'No';
    $phd = isset($_POST['phd']) ? 'Yes' : 'No';
    $file = isset($_FILES['file']) ? $_FILES['file']['name'] : 'No file uploaded';

    $html_content = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Your Personal Details</title>
    </head>
    <body>
        <h1>Your personal details</h1>
        <table border='1'>
            <tr>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Activity</th>
                <th>Primary</th>
                <th>Secondary</th>
                <th>Bachelor</th>
                <th>Masters</th>
                <th>PhD</th>
                <th>File</th>
            </tr>
            <tr>
                <td>$name</td>
                <td>$password</td>
                <td>$email</td>
                <td>$age</td>
                <td>$tel</td>
                <td>$gender</td>
                <td>$activity</td>
                <td>$primary</td>
                <td>$sec</td>
                <td>$bach</td>
                <td>$masters</td>
                <td>$phd</td>
                <td>$file</td>
            </tr>
        </table>
    </body>
    </html>
    ";

    $file_path = "output.php";

    file_put_contents($file_path, $html_content);

    echo "<p>Your details have been saved to <a href='$file_path' target='_blank'>output.html</a></p>";
}
?>
</body>
</html>
