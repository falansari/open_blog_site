<?php
/**
 * PHP version 5.6
 * 
 * Create user articles table migration script
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
 * Create user articles table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateUserArticlesTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('user_articles');
        $table->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey(
                'user_id', 'users', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('title', 'string', ['limit' => 100])
            ->addColumn('subtitle', 'string', ['limit' => 100])
            ->addColumn('content', 'text')
            ->addColumn('view_count', 'integer')
            ->addTimestamps()
            ->create();
    }
}
