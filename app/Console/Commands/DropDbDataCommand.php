<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DropDbDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop All Tables Of Database';

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
            Schema::dropIfExists($table);
            $this->line("table `{$table}` Droped");
        }
    }

    public function getTableList()
    {
        $dbName = config('database.connections.mysql.database');
        return collect(DB::select("SELECT * FROM INFORMATION_SCHEMA.TABLES where `TABLE_SCHEMA` = '{$dbName}' "));
    }


}
