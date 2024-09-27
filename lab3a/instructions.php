<?php
# from the $_SERVER global variable, check if the HTTP method used is POST, if its not POST, redirect to the index.php page
# Reference: https://www.php.net/manual/en/reserved.variables.server.php

// Supply the missing code
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];


$_SESSION['complete_name'] = $_POST['complete_name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['birthdate'] = $_POST['birthdate'];
$_SESSION['contact_number'] = $_POST['contact_number'];

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity 3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    <h1 class="title">Instructions</h1>
    <h2 class="subtitle">
    Hello <?php echo htmlspecialchars($complete_name); ?>, please read the instructions first
    </h2>

    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="POST" action="quiz.php">
        <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
        <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />

        <!-- Display the instruction -->
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <div class="field">
        <label class="label">Terms and conditions</label>
        <div class="control">
            <textarea class="textarea" readonly>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </textarea>
        </div>
    </div>

    <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" id="termsCheckbox" name="terms_agreed" onchange="toggleButton()">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <!-- Start Quiz button -->
        <button type="submit" id="startQuizButton" class="button is-link" disabled>Start Quiz</button>
    </form>
</section>

<script>
    function toggleButton() {
        const checkbox = document.getElementById('termsCheckbox');
        const button = document.getElementById('startQuizButton');
        button.disabled = !checkbox.checked;
    }
</script>

</body>
</html>