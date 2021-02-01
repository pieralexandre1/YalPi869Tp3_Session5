<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('comments')
            ->addColumn('address', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('suspect_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('crimes')
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('suspect_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('events')
            ->addColumn('date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('events_files')
            ->addColumn('event_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('file_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('events_suspects')
            ->addColumn('suspect_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('event_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('files')
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('path', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('status', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('i18n')
            ->addColumn('locale', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('model', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('field', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('suspects')
            ->addColumn('firstname', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vehicule_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('role', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('vehicules')
            ->addColumn('type', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('plate', 'string', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('comments');
        $this->dropTable('crimes');
        $this->dropTable('events');
        $this->dropTable('events_files');
        $this->dropTable('events_suspects');
        $this->dropTable('files');
        $this->dropTable('i18n');
        $this->dropTable('suspects');
        $this->dropTable('users');
        $this->dropTable('vehicules');
    }
}
