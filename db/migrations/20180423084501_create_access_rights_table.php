<?php
/**
 * PHP version 5.6
 * 
 * Create users' access rights table migration script
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
 * Create users' access rights table migration script
 * 
 * @category Migration
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
class CreateAccessRightsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('access_rights');
        $table->addColumn('access_right', 'char', ['limit' => 6])
            // access type: own (records associated with the user's own id) 
            // or all (records associated with user's own id and others)
            ->addColumn('access_type', 'char', ['limit' => 3])
            ->addTimestamps()
            // access right and access types unique as a composite
            // e.g. (create, own) and (create, all) are unique, but (create) isn't
            ->addIndex(
                ['access_type', 'access_right'], 
                [
                    'unique' => true,
                    'name' => 'idx_access_rights'
                ]
            )
            ->create();
    }
}
