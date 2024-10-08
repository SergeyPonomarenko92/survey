<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UsersTableMigrations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $users = $this->table('users');
        $users->addColumn('name', 'string', ['limit' => 20])
            ->addColumn('password', 'string')
            ->addColumn('email', 'string', ['limit' => 100])
            ->addIndex( 'email', ['unique' => true])
            ->create();
    }
}
