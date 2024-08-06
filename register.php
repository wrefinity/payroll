<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("./included.php"); ?>
    <script src="./scripts/auths.js" defer></script>
</head>

<body>

    <div class="container">
        <div class=" d-flex m-4 justify-content-center align-items-center">
            <div class="auth-form">
            <h4 class="text-center mb-4">TARABA STATE PAYROLL SYSTEM</h4>
                <h5 class="text-center mb-4"> <i> Register </i></h5>
                <form id="registerForm" method="POST" class="mt-3">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>