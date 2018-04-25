    <?php
    /**
     * PHP version 5.6
     * 
     * Website default/home page.
     * 
     * @category Webpage
     * @package  Open_Blog_Site
     * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
     * @license  All rights reserved
     * @link     https://github.com/fatima-alansari/open_blog_site
     */
      
      require 'layouts/head.html';
    ?>

  <body class='container'>
    
    <?php
      require 'layouts/navbar.html';
    ?>

    <main>
      <div class="navbar-template text-center">
        <h1>Top Articles</h1>
        <p class="lead text-info">From the world's top bloggers!</p>
      </div>

        <?php
          require_once '../Database.php';

          $db = Database::getInstance();

          $query = 'CALL proc_fetch_top_five_articles()';

          $result = $db->multiFetch($query);

        if ($result) {
            ?>

            <div class="container">
            <table class="table-hover table-responsive table-condensed">
              <tr>
                <td>Title</td>
                <td>Subtitle</td>
                <td>Date Posted</td>
                <td>Times Viewed</td>
                <td>Creator</td>
              </tr>
            <?php

            for ($i = 0; $i < count($result); $i++ ) {
                echo '<tr>
                <td class="text-capitalize">
                  <a href="/articles/view.php?id='.$result[$i]->article_id.'">'
                  .$result[$i]->title .'</a></td>
                <td>'.$result[$i]->subtitle.'</td>
                <td>'.date('M jS Y', strtotime($result[$i]->created_at)).'</td>
                <td>'.$result[$i]->view_count.'</td>
                <td><a href="/users/view.php?id='.$result[$i]->user_id.'">'
                  .$result[$i]->username.'</a></td>
                </tr>';
            }
            echo '</table>';
        } else {
            echo 'no results found.';
        }
        ?>
        </div> <!-- END TABLE -->
    </main>

  </body>

    <?php
      require 'layouts/footer.html';
    ?>
</html>