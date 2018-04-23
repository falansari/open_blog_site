<?php
/**
 * PHP version 5.6
 * 
 * Create default access rights migration script.
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
 * Create default access rights migration script.
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateDefaultAccessRights extends AbstractMigration
{
    /**
     * Migrate up.
     * 
     * @return void
     */
    public function up()
    {
        $rows = [
            ['access_right' => 'create', 'access_type' => 'own'],
            ['access_right' => 'read', 'access_type' => 'own'],
            ['access_right' => 'update', 'access_type' => 'own'],
            ['access_right' => 'delete', 'access_type' => 'own'],
            ['access_right' => 'create', 'access_type' => 'all'],
            ['access_right' => 'read', 'access_type' => 'all'],
            ['access_right' => 'update', 'access_type' => 'all'],
            ['access_right' => 'delete', 'access_type' => 'all']
        ];

        $this->insert('access_rights', $rows);
    }

    /**
     * Migrate Down.
     * 
     * @return void
     */
    public function down()
    {
        $this->execute('DELETE FROM access_rights');
    }
}
