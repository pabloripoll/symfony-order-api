<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611084625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Admin users table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $table = $schema->createTable('admin_users');

        $table->addColumn('id', 'integer', ['autoincrement' => true]);        
        $table->addColumn('user', 'string', ['length' => 64, 'notnull' => false]);
        $table->addColumn('password', 'string', ['length' => 128, 'notnull' => false]);
        $table->addColumn('created_at', 'datetime', ['notnull' => false]);
        $table->addColumn('updated_at', 'datetime', ['notnull' => false]);

        $table->setPrimaryKey(['id']);
        $table->addIndex(['user']);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('admin_users');
    }
}
