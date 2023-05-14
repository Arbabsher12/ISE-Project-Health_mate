<?php
// Variable declared in PHP block
$myVariable = "Hello, world!";
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP and HTML Example</title>
</head>
<body>
    <h1><?php echo $myVariable; ?></h1>
    <!-- Use $myVariable within the HTML block -->

    <?php
    // Another PHP block
    $anotherVariable = "This is another variable.";
    ?>

    <p><?php echo $anotherVariable; ?></p>
    <!-- Use $anotherVariable within the HTML block -->
</body>
</html>

<?php
// Use $myVariable and $anotherVariable outside of the HTML block
?>