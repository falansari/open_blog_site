<?php
/**
 * PHP version 5.6
 * 
 * Article search results page.
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
    <!-- DATATABLES DEPENDENCIES -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>
</head>

  <body class='container'>
    
    <?php
      require 'layouts/navbar.php';

      require_once $_SERVER['DOCUMENT_ROOT'].'/../Database.php';
      $db = Database::getInstance();
    ?>

    <main>
      <div class="navbar-template text-center">
        <h1>Search Results</h1>
      </div>
      
        <?php
        // User's search query
        $searchBy = trim($_POST['search']);

        if (!$searchBy) {
            // TODO: If no search term is provided, retrieve all records instead.
            echo 'No search query provided. Please use the search bar first.';
        }

        // Now query for results
        // Values: search term, order by, start, display
        $query = 'CALL proc_fetch_articles_search("'.$searchBy.'");';
        $result = $db->multiFetch($query);
        
        if ($result) {
            echo '
            <div class="container">
            <table id="searchTable" class="table-hover table-responsive table-condensed">
                <thead>
                    <tr>
                    <td><a href="/search.php">Title</a></td>
                    <td>Subtitle</td>
                    <td><a href="/search.php">Date Posted</a></td>
                    <td><a href="/search.php">Times Viewed</a></td>
                    <td><a href="/search.php">Creator</a></td>
                    </tr>
                </thead>
                <tbody>';

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
            echo '</tbody></table>';
        } else {
            echo 'no results found.';
        }
        ?>
    </main>

  </body>

    <?php
      require 'layouts/footer.html';
    ?>

    <script>
        $(document).ready( function () {
        $('#searchTable').DataTable();
        } );
    </script>
</html>