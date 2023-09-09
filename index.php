<!DOCTYPE html>
<html lang="en">

<head>
  <title>Printzy</title>
  <style>
  body {
    background-color: #EAF2F8;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    h1 {
      color: #E25822;
      font-size: 40px;
      text-align: center;
      margin: 0;
      padding-top: 30px;
      text-transform: uppercase;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    hr {
      width: 50%;
      border: none;
      border-top: 1px solid #E25822;
      margin: 20px 0;
    }

    form {
      width: 300px;
      background-color: #FFF8F0;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
      color: #E25822;
      margin: 0;
      margin-bottom: 20px;
      font-size: 18px;
      text-align: center;
    }

    input[type="file"] {
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #E25822;
      color: #FFF;
      padding: 10px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #C7471D;
    }

    a {
      color: #E25822;
      text-decoration: none;
      margin-top: 20px;
      font-size: 14px;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #C7471D;
    }
    /* Your CSS styles here */
  </style>
  <script>
    // JavaScript for cost calculation
    function calculateCost() {
      // Get the input values
      var numberOfCopies = parseInt(document.getElementById("numberOfCopies").value);
      var startPage = parseInt(document.getElementById("startPage").value);
      var endPage = parseInt(document.getElementById("endPage").value);

      // Calculate the total cost
      var costPerPage = 2; // Cost per page in rupees
      var totalPages = endPage - startPage + 1;
      var totalCost = numberOfCopies * totalPages * costPerPage;

      // Display the total cost
      document.getElementById("totalCost").innerHTML = "Total Cost: " + totalCost + " Rupees";
    }
  </script>
</head>

<body>
  <center>
    <h1>Printzy</h1>
  </center>
  <div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <h2>Upload the document here</h2>
      <input type="file" name="File Upload" id="File Upload">
      
      <!-- User input for number of copies and page range -->
      <label for="numberOfCopies">Number of Copies:</label>
      <input type="number" id="numberOfCopies" name="numberOfCopies" min="1" value="1">
      <br>
      <label for="startPage">Start Page:</label>
      <input type="number" id="startPage" name="startPage" min="1" value="1">
      <br>
      <label for="endPage">End Page:</label>
      <input type="number" id="endPage" name="endPage" min="1" value="1">
      <br>
      
      <!-- Button to calculate the cost -->
      <input type="button" value="Calculate Cost" onclick="calculateCost()">
      
      <!-- Display the total cost here -->
      <div id="totalCost"></div>

      <!-- Submit button for file upload -->
      <input type="submit" value="Upload">
    </form>
    <a href="logout.php">Logout</a>
  </div>
</body>

</html>
