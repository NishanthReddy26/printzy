<?php
   $FileName = $_FILES['File_Upload']['name'];
   $TmpName = $_FILES['File_Upload']['tmp_name'];
   move_uploaded_file($TmpName, $FileName);
   echo("<h1>File Uploaded Successfully</h1>");
?>

<body bgcolor="cyan">
   <center>
      <h2>Do your payment here</h2>
      <img src="qr.jpg" style="width: 200px; height: auto;">
  </center>
</body>
