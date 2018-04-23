<?php
/**
 * PHP version 5.6
 * 
 * Create roles' access rights table migration script
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
 * Create roles' access rights table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateRoleAccessRightsTable extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('role_access_rights');
        $table->addColumn('role_id', 'integer', ['null' => true])
            ->addForeignKey(
                'role_id', 'roles', 'id', 
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addColumn('access_right_id', 'integer', ['null' => true])
            ->addForeignKey(
                'access_right_id', 'access_rights', 'id',
                ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
            )
            ->addTimestamps()
            ->create();
    }
}
