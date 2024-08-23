<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <style>
        .button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    
    <form method="POST" action="instructions.php" id="registration-form">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input id="complete_name" class="input" type="text" name="complete_name" placeholder="Complete Name">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input id="email" class="input" name="email" type="email" placeholder="Email Address">
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date" />
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="number" />
            </div>
        </div>

        <!-- Next button -->
        <button id="proceed_next" type="submit" class="button is-link" disabled>Proceed Next</button>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('complete_name');
        const emailInput = document.getElementById('email');
        const proceedButton = document.getElementById('proceed_next');

        function validateForm() {
            const nameValid = nameInput.value.trim() !== '';
            const emailValid = emailInput.value.trim() !== '' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
            proceedButton.disabled = !(nameValid && emailValid);
        }

        nameInput.addEventListener('input', validateForm);
        emailInput.addEventListener('input', validateForm);

        
        validateForm();
    });
</script>
</body>
</html>
