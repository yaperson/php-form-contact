<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    Name:       <input type="text" name="name" required><br/>
                <span class="error">* <?php echo $nameErr; ?></span>
    E-mail:     <input type="text" name="email" required><br/>
                <span class="error">* <?php echo $emailErr; ?></span>
    Website:    <input type="text" name="website"><br/>
                <span class="error">* <?php echo $websiteErr; ?></span>
    Comment:    <textarea name="comment" rows="5" cols="40"></textarea><br/>
                <span class="error">* <?php echo $commentErr; ?></span>
    Gender:     <textarea name="comment" rows="5" cols="40"></textarea><br/>
                <span class="error">* <?php echo $commentErr; ?></span>
                <input type="submit">
    </form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['fname'];
        if (empty($name)) {
            echo "Name is empty";
        }
        else{
            echo $name;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        echo 'name = '.$_POST['name'] . '<br/>';
        echo 'email = '.$_POST['email'] . '<br/>';
        echo 'website = '.$_POST['website'] . '<br/>';
        echo 'comment = '.$_POST['comment'] . '<br/>';
    }
    ?>
</body>
</html>
