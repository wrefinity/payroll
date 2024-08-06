<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministry and Unit Management</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Ministry Management</h1>
        
        <form id="ministryForm" enctype="multipart/form-data">
            <input type="hidden" id="action" name="action" value="createMinistry">
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Ministry Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2 class="mt-5">Ministry List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="ministryList"></tbody>
        </table>

        <h1 class="mt-5">Unit Management</h1>
        
        <form id="unitForm">
            <input type="hidden" id="unitAction" name="action" value="createUnit">
            <input type="hidden" id="unitId" name="id">
            <div class="mb-3">
                <label for="ministry_id" class="form-label">Ministry ID</label>
                <input type="text" class="form-control" id="ministry_id" name="ministry_id" required>
            </div>
            <div class="mb-3">
                <label for="unitName" class="form-label">Unit Name</label>
                <input type="text" class="form-control" id="unitName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="unitDescription" class="form-label">Description</label>
                <textarea class="form-control" id="unitDescription" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="unitAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="unitAddress" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2 class="mt-5">Unit List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Ministry ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="unitList"></tbody>
        </table>
    </div>


</body>
</html>
