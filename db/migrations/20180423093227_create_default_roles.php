<?php
/**
 * PHP version 5.6
 * 
 * Create default user roles migration script.
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
 * Create default user roles migration script.
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateDefaultRoles extends AbstractMigration
{
    /**
     * Migrate up.
     * 
     * @return void
     */
    public function up()
    {
        $roles = [
            ['role' => 'basic'],
            ['role' => 'author'],
            ['role' => 'admin']
        ];
        $this->insert('roles', $roles);

        /* [START] BASIC USER */
        // read all
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'basic'), 
                (SELECT id FROM access_rights WHERE access_right = 'read' AND
                access_type = 'all')
            )"
        );
        /* [END] BASIC USER */

        /* [START] AUTHOR USER */
        // create own
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'author'), 
                (SELECT id FROM access_rights WHERE access_right = 'create' AND
                access_type = 'own')
            )"
        );

        // read own
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'author'), 
                (SELECT id FROM access_rights WHERE access_right = 'read' AND
                access_type = 'own')
            )"
        );

        // update own
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'author'), 
                (SELECT id FROM access_rights WHERE access_right = 'update' AND
                access_type = 'own')
            )"
        );

        // delete own
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'author'), 
                (SELECT id FROM access_rights WHERE access_right = 'delete' AND
                access_type = 'own')
            )"
        );
        /* [END] AUTHOR USER */

        /* [START] ADMIN USER */
        // create all
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'admin'), 
                (SELECT id FROM access_rights WHERE access_right = 'create' AND
                access_type = 'all')
            )"
        );

        // read all
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'admin'), 
                (SELECT id FROM access_rights WHERE access_right = 'read' AND
                access_type = 'all')
            )"
        );

        // update all
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'admin'), 
                (SELECT id FROM access_rights WHERE access_right = 'update' AND
                access_type = 'all')
            )"
        );

        // delete all
        $this->query(
            "insert into role_access_rights (role_id, access_right_id)
            values 
            (
                (SELECT id FROM roles WHERE role = 'admin'), 
                (SELECT id FROM access_rights WHERE access_right = 'delete' AND
                access_type = 'all')
            )"
        );
        /* [END] ADMIN USER */
    }

    /**
     * Migrate Down.
     * 
     * @return void
     */
    public function down()
    {
        $this->execute('DELETE FROM roles');
        $this->execute('DELETE FROM role_access_rights');
    }
}
