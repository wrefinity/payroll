<!DOCTYPE html>
<html lang="en">
<head>
<?php require("./included.php"); ?>
<script src="../scripts/units.js" defer></script>
</head>
<body>
    <div class="m-4 justify-content-center align-items-center">
        <div class="auth-form">
        <h4 class="mt-2 text-center">Unit Management</h4>
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
        </div>

        <h2 class="mt-5">Unit List</h2>
        <table class="table table-responsive table-striped table-hover">
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
