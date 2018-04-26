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
      
      require_once $_SERVER['DOCUMENT_ROOT'].'/layouts/head.html';
    ?>

  <body class='container'>
    
    <?php
      require '../layouts/navbar.php';

      $articleId = $_GET['id'];

    if ($articleId) {
        include_once $_SERVER['DOCUMENT_ROOT'].'/../Database.php';
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

        if (!$result) {
            echo 'This article does not exist.';
        }
    } else {
        echo 'Invalid url.';
    }
    ?>

    <main class="text-center">
      <div class="navbar-template text-center">
        <h1 class=""><?php echo $result->title ?></h1>
        <h2 class="lead text-info"><?php echo $result->subtitle ?></h2>
        <h4>By 
            <?php
                echo '<a class="link" href="/users/articles.php?id='
                  .$result->user_id.'">'
                  .$result->first_name.' '.$result->last_name.'</a>'; 
            ?>
        </h4>
        <h5 class="fa fa-clock-o">
            <?php echo(date('M jS Y\, h:i:s a', strtotime($result->created_at))); ?>
        </h5>
        <br />
        
        <p class="lead text-justify"><?php echo $result->content ?></p>
      </div>
    </main>

  </body>

    <?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/layouts/footer.html';
    ?>
</html>