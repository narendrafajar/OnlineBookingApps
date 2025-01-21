<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;

class DatabaseBackupCommand extends Command
{
    protected $signature = 'database:backup';
    protected $description = 'Backup database to a SQL file';

    public function handle()
    {
        $this->info('Membuat backup database...');

        MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile(storage_path('app/backup.sql'));

        $this->info('Backup berhasil dibuat di: ' . storage_path('app/backup.sql'));
    }
}
