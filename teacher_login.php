<?php
session_destroy();
?>
<html>
<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  

</head>
    <body>
            <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            
          <ul class="navbar-nav">
            <li class="nav-item">
              
            </li>
           <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <a class="navbar-brand" href="#">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>
        
        
        <br>
        <br>
        <!--action = new homepage-->
            <form method="post" action="welcome.php" align="center">
                
                <br>
                <h2>Login </h2>
                <br>
               
                <label for="userName">Username:</label><br>
                <input type = "userName"
                id = "userName"
                name = "userName">
                <br>
                <br>
            <label for="Apassword">Password:</label><br>
                <input type="password" id="pwd" name="pwd" required>
                <br>
                <br>
            <input class="btn-outline-lg" type="submit">   
            <br>
        </form>
        <br><br><br>
        <br>
        <br>
    </body>
    <footer>
        <p>
            Copyright for Carnegie Mellon University <span>&#169;</span>
        <br>
        </p>
    </footer>
    <br>
    <br>    
</html>