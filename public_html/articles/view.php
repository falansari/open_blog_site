    <?php
    /**
     * PHP version 5.6
     * 
     * Article view page template.
     * 
     * @category Webpage
     * @package  Open_Blog_Site
     * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
     * @license  All rights reserved
     * @link     https://github.com/fatima-alansari/open_blog_site
     */
      
      require '../layouts/head.html';
    ?>

  <body class='container'>
    
    <?php
      require '../layouts/navbar.html';

      $articleId = $_GET['id'];

      require_once '../../Database.php';
      $db = Database::getInstance();

      /**
       * Update article's view count
       */
      $updateCountQuery = 'CALL proc_update_article_view_count('.$articleId.')';
      $db->querySQL($updateCountQuery);

      /**
       * Fetch article's data
       */
      $fetchQuery = 'CALL proc_fetch_article_info('.$articleId.')';
      $result = $db->singleFetch($fetchQuery);

    if ($result) {
      print('title: '.$result->title);
    } else {
        echo 'This article does not exist.';
    }
    ?>

    <main class="text-center">
      <div class="navbar-template text-center">
        <h1 class="text-capitalize"><?php /* article title */ ?></h1>
        <p class="lead text-info"><?php /* article subtitle */ ?></p>
      </div>
    </main>

  </body>

    <?php
      require '../layouts/footer.html';
    ?>
</html>