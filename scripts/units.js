const url = './routes/unit_routes.php';

// This function fetches all units of a department based on the selected ministry_id and dept_id ID
function loadUnit(role, ministry_id, dept_id) {
  // Define the URL to which the POST request will be sent
  const url = "loaders/units.php";

//   window.alert(`dept-id: ${dept_id}`)
  // Ensure that both the ministry_id and department id fields are supplied
  if (!ministry_id || !dept_id) {
    window.alert("both ministry and department must be selected to load the unit");
    return;
  }



  // Send a POST request to the server with the specified parameters
  $.post(
    url,
    {
      ministry_id: ministry_id,
      role: role,
      dept_id: dept_id,
    },
    function (response) {
      // Parse the JSON response from the server
      const data = JSON.parse(response);
      alert(response)
      // Check if the response status is 'success'
      if (data.status === "success") {
        // Extract the units from the response
        const units = data.units;
        // Call the function to populate the select element with ID 'unitcode'
        populateSelect("unitcode", units);
      } else {
        // If the response status is not 'success', show an alert with a message
        window.alert("No units found");
      }
    }
  );
}

$(document).ready(function() {

    loadUnits();
    $('#unitForm').on('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                if (result.status === 'success') {
                    alert('Unit saved successfully!');
                    $('#unitForm')[0].reset();
                    loadUnits();
                } else {
                    alert('Error saving unit.');
                }
            }
        });
    });
});



function loadUnits() {
    $.post(url, { action: 'getUnits' }, function(response) {
        let result = JSON.parse(response);
        if (result.status === 'success') {
            let unitList = $('#unitList');
            unitList.empty();
            result.data.forEach(unit => {
                unitList.append(`
                    <tr>
                        <td>${unit.name}</td>
                        <td>${unit.description}</td>
                        <td>${unit.address}</td>
                        <td>${unit.ministry_id}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editUnit(${unit.id})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteUnit(${unit.id})">Delete</button>
                        </td>
                    </tr>
                `);
            });
        } else {
            alert('Error loading units.');
        }
    });
}

function editUnit(id) {
    $.post(url, { action: 'getUnitById', id: id }, function(response) {
        let result = JSON.parse(response);
        if (result.status === 'success') {
            let unit = result.data;
            $('#unitAction').val('updateUnit');
            $('#unitId').val(unit.id);
            $('#ministry_id').val(unit.ministry_id);
            $('#unitName').val(unit.name);
            $('#unitDescription').val(unit.description);
            $('#unitAddress').val(unit.address);
        } else {
            alert('Error fetching unit details.');
        }
    });
}

function deleteUnit(id) {
    if (confirm('Are you sure you want to delete this unit?')) {
        $.post(url, { action: 'deleteUnit', id: id }, function(response) {
            let result = JSON.parse(response);
            if (result.status === 'success') {
                alert('Unit deleted successfully!');
                loadUnits();
            } else {
                alert('Error deleting unit.');
            }
        });
    }
}
