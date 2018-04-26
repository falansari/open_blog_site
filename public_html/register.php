<?php
/**
 * PHP version 5.6
 * 
 * Website user registration page.
 * 
 * @category Webpage
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */

require 'layouts/head.html';
?>
<head>
  <!-- PURECSS -->
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
</head>

  <body class='container'>
    <?php
      require 'layouts/navbar.php';
    ?>
    <main>
      <div class="navbar-template text-center">
        <h1>Sign Up</h1>
        <p class="lead text-info">Fill the form below to create an account:</p>
      </div>
      <div>
        <form action="/register.php" method="POST" class="pure-form pure-form-stacked">
          <fieldset>
            <label><b>Username:</b></label>
              <input type="text" name="username" size="20" value="" required/>
            <br />
            <label><b>First Name:</b></label>
              <input type="text" name="fName" size="20" value="" required/>
            <br />
            <label><b>Last Name:</b></label>
              <input type="text" name="lName" size="20" value="" required/>
              <br />
            <label><b>E-mail Address:</b></label>
              <input type="email" name="email" size="50" value="" required/>
              <br />
            <label><b>Enter Password</b></label>
              <input type="password" name="password" size="60" value="" required/>
              <br />
            <div align="center">
              <input type ="submit" value ="Register" class="pure-button pure-button-primary"/>
            </div>
            <input type="hidden" name="submitted" value="1" />
          </fieldset>
        </form>
      </div>
    </main>
  </body>

<?php
if (isset($_POST['submitted'])) {
    $username = $_POST['username'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once $_SERVER['DOCUMENT_ROOT'].'/../Database.php';
    $db = Database::getInstance();

    $query = 'CALL proc_register_user("'.$username.'", "'.$fName.'", "'.$lName.'", "'.$email.'", "'.$password.'")';
    $processQuery = $db->querySQL($query);

    echo 'You have successfully registered. Please login through the login page.';
}
?>
</div>
    <?php
      require 'layouts/footer.html';
    ?>
</html>