// This function fetches all departments based on the selected  ministries
function loadDepartment(fact_id, role, dept_id, dept_name) {
  // Define the URL to which the POST request will be sent
  const url = "loaders/departments.php";
  action = "load_dept";

  // Ensure that both the ministry id is supplied
  if (!fact_id) {
    window.alert("kindly select the ministry to load the departments");
    return;
  }

  // Send a POST request to the server with the specified parameters
  $.post(
    url,
    {
      contentvar: action,
      ministry_id: ministry_id,
      role: role,
      dept_id: dept_id,
      dept_name: dept_name,
    },
    function (response) {
      // Parse the JSON response from the server
      const data = JSON.parse(response);

      // Check if the response status is 'success'
      if (data.status === "success") {
        // Extract the departments from the response
        const departments = data.departments;

        // Call the function to populate the select element with ID 'deptcode'
        populateSelect("deptcode", departments);

        // Iterate through each department and create an option element for it
        for (const [dept_id, dept_name] of Object.entries(departments)) {
          const option = document.createElement("option");
          // Set the value of the option element to the department ID
          option.value = `${dept_id}`;
          // Set the text content of the option element to the department name
          option.textContent = dept_name;
          // Append the option element to the select element
          selectElement.appendChild(option);
        }
      } else {
        // If the response status is not 'success', show an alert with a message
        window.alert("No departments found");
      }
    }
  );
}
