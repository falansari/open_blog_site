<?php
/**
 * PHP version 5.6
 * 
 * Create users table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari
 */

use Phinx\Migration\AbstractMigration;

/**
 * Create users table migration class
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        // Create users table
        $table = $this->table('users');
        $table->addColumn('username', 'char', ['limit' => 20])
            ->addColumn('first_name', 'string', ['limit' => 20])
            ->addColumn('last_name', 'string', ['limit' => 20])
            ->addColumn('email', 'char', ['limit' => 50])
            // Store hashed & salted pw with bcrypt
            ->addColumn('password', 'char', ['limit' => 60])
            ->addTimestamps()
            ->addIndex(['username', 'email'], ['unique' => true])
            ->create();
    }

    /**
     * Migrate Up.
     * 
     * @return void
     */
    public function up()
    {

    }

    /**
     * Migrate Down.
     * 
     * @return void
     */
    public function down()
    {
        
    }
}
