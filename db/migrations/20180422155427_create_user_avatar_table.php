<?php
/**
 * PHP version 5.6
 * 
 * Create users' avatars table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari
 */

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

/**
 * PHP version 5.6
 * 
 * Create user' avatars table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateUserAvatarTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('user_avatar');
        $table->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey(
                'user_id', 'users', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('file_name', 'char', ['limit' => 20])
            ->addColumn('file_type', 'char', ['limit' => 4])
            // 1mb filesize limit for user avatars
            ->addColumn('file_size', 'integer', ['limit'=> MysqlAdapter::INT_MEDIUM])
            ->addTimestamps()
            ->create();
    }
}
