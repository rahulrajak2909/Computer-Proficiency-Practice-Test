<?php
session_start();
$message = '';
if (isset($_SESSION['name_alert'])) {
  $message = 'Incorrect Email and Password !!';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="alogin.css">
    <script src="https://use.fontawesome.com/your-embed-code.js"></script>
    <style>
        body {
            background-image: url(renamenew.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <form action="alogin.php" method="post">
    <div class="wel">
        <div class="cppt-logo">
            <img src="CPPTLOGO.png" alt="">
        </div>
        <div class="wel-title">
            <h1>COMPUTER PROFICIENCY PRACTICE TEST (CPPT)</h1>
            <h2>(Madhav Institute Of Technology & Science)</h2>
        </div>
        <div class="mits-logo">
            <img src="mits-logo.png" alt="">
        </div>
    </div>
    <section class="form">
        <div class="container">
            <h1> <u>Login </u></h1>
            <form >
            <p style='color: black;
        font-size: 1rem;
        margin-left: 1rem;
        margin-top: -0.6rem; color: red;
        font-family: cursive;'><?php echo $message; ?></p>
                <br>
                <div>

                    <label for="use"> Username: </label>
                    <input type="email"  name="aname" placeholder="type here" required>
                </div>
                <br>
                <div>
                    <label for="uss">Password:</label>
                    <input type="Password" name="pass" placeholder="password" required>
                </div>
                <br>
                <div class="btn">
                    <a href="ahome.php"><button type="submit" name="submit" class="login-btn">Login</button></a>
                </div>
                <br>
        

            </form>
            <?php unset($_SESSION['name_alert']); ?>
        </div>
    </section>
    <p class="copyright">     
© Copyright Computer Proficiency Practice Test 2023. 
&nbsp; 
By accessing any information provided in this website, you implicitly agree to terms and conditions
    </p>
</form>   




</body>

</html>