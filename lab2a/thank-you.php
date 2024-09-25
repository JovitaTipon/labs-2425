<?php

require "helpers/helper-functions.php";

session_start();

/*$fullname = $_POST['fullname'];
$bday = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$sex = $_POST['sex'];
$program = $_POST['program'];
$address = $_POST['address'];*/
$email = $_POST['email'];
$password = $_POST['password'];
$encrypt = sha1($password);
$agree = $_POST['agree'];

/*$_SESSION['fullname'] = $fullname;
$_SESSION['birthdate'] = $bday;
$_SESSION['contact_number'] = $contact_number;
$_SESSION['sex'] = $sex;
$_SESSION['program'] = $program;
$_SESSION['address'] = $address;*/
$_SESSION['email'] = $email;
$_SESSION['password'] = $encrypt;
$_SESSION['agree'] = $agree;

$form_data = $_SESSION;


$csv_file = '../lab2b/registrations.csv';
$opened_file_handler = fopen($csv_file, 'a');

if ($opened_file_handler !== false) {
  if (filesize($csv_file) == 0) {
      fputcsv($opened_file_handler, ['fullname', 'birthdate', 'contact_number', 'sex', 'program', 'address', 'Email', 'Password', 'Agree',]);
  }

  $row_data = [
              $_SESSION['fullname'],
              $_SESSION['birthdate'],
              $_SESSION['contact_number'],
              $_SESSION['sex'],
              $_SESSION['program'],
              $_SESSION['address'],
              $email, 
              $encrypt,
              $agree,];

  fputcsv($opened_file_handler, $row_data);
  fclose($opened_file_handler);
  } else {
  echo "Error: Unable to open the file for writing.";
}

session_destroy();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
      

      </div>
    </div>
  </div>
</section>

</body>
</html>