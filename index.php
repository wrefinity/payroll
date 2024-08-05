<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./includes/index.php") ?>
    <script src="./script/auth.js" defer></script>
</head>

<body>
    <div class="login-form">
        <h1 class="text-center mb-4">Login</h1>
        <form id="loginForm">
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
</body>

</html>