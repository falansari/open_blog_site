<?php
/**
 * PHP version 5.6
 * 
 * Create users' roles table migration script
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
 * Create users' roles table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateRolesTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('roles');
        $table->addColumn('role', 'char', ['limit' => 5])
            // role's access rights in a json array format
            // Access rights: create, read, update, delete (CRUD)
            ->addColumn('role_access_rights', 'json')
            ->addTimestamps()
            ->addIndex('role', ['unique' => true])
            ->create();
    }
}
