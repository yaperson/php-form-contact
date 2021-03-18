<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>PHP Form</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    Name:       <input type="text" name="name" required>   <br/>
    E-mail:     <input type="text" name="email" required>  <br/>
    Website:    <input type="text" name="website">         <br/>
    Comment:    <textarea name="comment" rows="5" cols="40"></textarea><br/>

  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>value="male">     Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?>value="other">   Other
  <input type="submit">
  </form>

    <?php
          echo 'name = '    .$_POST['name']     . '<br/>';
          echo 'email = '   .$_POST['email']    . '<br/>';
          echo 'website = ' .$_POST['website']  . '<br/>';
          echo '<textarea>' .'comment = '.$_POST['comment'] . '</textarea><br/>';
          echo 'gender =  ' .$_POST['gender']   . '<br/>';
    ?>
<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = test_input($_POST["name"]);

    if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)) {
        $nameErr = "Only letters and white space allowed";
    }
    
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    }

    $website = test_input($_POST["website"]);

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    $websiteErr = "Invalid URL";
    }
?>
</body>
</html>
