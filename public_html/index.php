<html>

  <?php
    /**
     * PHP version 5.6
     * 
     * Website default page.
     */

    require 'layouts/header.html';
    require 'layouts/navbar.html';
  ?>

  <body>
    <h1>article.test</h1>
    <p>Articles site accessible!</p>
  </body>

  <?php
    echo 'PHP version '.phpversion();

    require 'layouts/footer.html';
  ?>

</html>