<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("./included.php"); ?>
    <script src="./scripts/auths.js" defer></script>
</head>

<body>
    
    <div class="d-flex m-4 justify-content-center align-items-center">
        <div class="login-form">
        <h4 class="text-center mb-4">Login</h4>
        <form id="loginForm" action="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
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
</body>

</html>