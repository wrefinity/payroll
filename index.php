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
                <h4 class="text-center mb-4"><i> Login </i></h4>
                <form id="loginForm" action="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>