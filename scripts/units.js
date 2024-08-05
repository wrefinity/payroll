// This function fetches all units of a department based on the selected ministry_id and dept_id ID
function loadProgramme(role, ministry_id, dept_id) {
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
