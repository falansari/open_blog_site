<?php
/**
 * PHP version 5.6
 * 
 * Create article comments table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari
 */

use Phinx\Migration\AbstractMigration;

/**
 * PHP version 5.6
 * 
 * Create article comments table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateArticleCommentsTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('article_comments');
        $table->addColumn('article_id', 'integer', ['null' => true])
            ->addForeignKey(
                'article_id', 'user_articles', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            // comment poster's id
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey(
                'user_id', 'users', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('comment', 'string', ['limit' => 300])
            ->addTimestamps()
            ->create();
    }
}
