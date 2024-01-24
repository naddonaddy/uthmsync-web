<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTHMSync</title>
    <link rel="stylesheet" href="style-user/style-user.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="role-container">
        <h1>Are you a</h1>
        <div class="role-button-container">
            <a href="#" class="button staff-button" data-role="staff">Staff</a>
            <a href="#" class="button student-button" data-role="student">Student</a>
        </div>
        <button class="button continue-button">Continue</button>
    </div>

    <script>
        let roleSelected = false;

        const continueButton = document.querySelector('.continue-button');
        continueButton.addEventListener('click', redirectToRegistration);

        function redirectToRegistration() {
            const selectedRole = document.querySelector('.role-button-container a.active');
            if (selectedRole) {
                roleSelected = true;
                const roleType = selectedRole.getAttribute('data-role');
                if (roleType === 'staff') {
                    window.location.href = 'staff-registration.php';
                } else if (roleType === 'student') {
                    window.location.href = 'student-registration.php';
                }
            } else {
                alert('Please choose your role.');
            }
        }

        const roleButtons = document.querySelectorAll('.role-button-container a');
        roleButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                handleRoleSelection(event);
            });
        });

        function handleRoleSelection(event) {
            roleButtons.forEach(button => {
                button.classList.remove('active');
                button.textContent = button.textContent.replace('✔️', '');
            });

            const selectedButton = event.target;
            selectedButton.classList.add('active');
            selectedButton.textContent += ' ✔️';
        }

        window.onbeforeunload = function () {
            if (roleSelected && event.target.activeElement.classList.contains('continue-button')) {
                return;
            }
            const selectedRole = document.querySelector('.role-button-container a.active');
            if (selectedRole) {
                return 'Are you sure you want to leave this page?';
            }
        };
    </script>
</body>

</html>