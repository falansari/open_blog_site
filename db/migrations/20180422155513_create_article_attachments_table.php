<?php
/**
 * PHP version 5.6
 * 
 * Create article attachments table migration script
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
 * Create article attachments table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateArticleAttachmentsTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('article_attachments');
        $table->addColumn('article_id', 'integer', ['null' => true])
            ->addForeignKey(
                'article_id', 'user_articles', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('file_name', 'char', ['limit' => 20])
            ->addColumn('file_type', 'char', ['limit' => 4])
            ->addColumn('file_size', 'integer')
            ->addTimestamps()
            ->create();
    }
}
