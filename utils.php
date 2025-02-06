<?php

if (!isset($_GET['authorized'])) {
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
</head>
<body>
    <h3>Important Notes</h3>
    <p>1 hour for assessment</p>
    <p>Input check or not pending</p>
    <p>result page pending</p>
</body>

<script src="src/jquery/jquery.js"></script>
<script src="src/mousetrap/mousetrap.min.js"></script>
<script src="src/js/for_utils.js"></script>

</html>