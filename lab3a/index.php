<?session_start();?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="POST" action="instructions.php">
    <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" id="complete_name" type="text" name="complete_name" placeholder="Complete Name">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" id="email" name="email" type="email">
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date">
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="tel" pattern="[0-9]{10}" placeholder="1234567890">
            </div>
        </div>

        <!-- Next button -->
        <button id="submit_button" type="submit" class="button is-link" disabled>Proceed Next</button>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('complete_name');
        const emailInput = document.getElementById('email');
        const submitButton = document.getElementById('submit_button');

        function validateForm() {
            const nameIsValid = nameInput.value.trim() !== '';
            const emailIsValid = emailInput.value.trim() !== '' && emailInput.checkValidity();
            
            if (nameIsValid && emailIsValid) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        nameInput.addEventListener('input', validateForm);
        emailInput.addEventListener('input', validateForm);
    });
</script>

</body>
</html>