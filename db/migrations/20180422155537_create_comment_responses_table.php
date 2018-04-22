<?php
/**
 * PHP version 5.6
 * 
 * Create comments' responses table migration script
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
 * Create comments' responses table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateCommentResponsesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('comment_responses');
        $table
            // reference comment being replied to
            ->addColumn('comment_id', 'integer', ['null' => true])
            ->addForeignKey(
                'comment_id', 'article_comments', 'id',
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            // reply commenter's id
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey(
                'user_id', 'users', 'id',
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('response', 'string', ['limit' => 300])
            ->addTimestamps()
            ->create();
    }
}
