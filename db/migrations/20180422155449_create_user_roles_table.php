<?php
/**
 * PHP version 5.6
 * 
 * Create user roles table migration script
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
 * Create user roles table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateUserRolesTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('user_roles');
        $table->addColumn('role_id', 'integer', ['null' => true])
            ->addForeignKey(
                'role_id', 'roles', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey(
                'user_id', 'users', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addTimestamps()
            ->create();
    }
}
