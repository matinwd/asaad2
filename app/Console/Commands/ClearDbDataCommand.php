<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class ClearDbDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear All Data Seeded Of Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->getTableList()->pluck('TABLE_NAME')->toArray() as $table) {
            if (!in_array($table, ['migrations']))
                DB::table($table)->truncate();
            $this->line("table `{$table}` Truncate");
        }
    }

    public function getTableList()
    {
        $dbName = config('database.connections.mysql.database');
        return collect(DB::select("SELECT * FROM INFORMATION_SCHEMA.TABLES where `TABLE_SCHEMA` = '{$dbName}' "));
    }


}
