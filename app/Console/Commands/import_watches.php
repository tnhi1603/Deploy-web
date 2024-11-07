<?php

namespace App\Console\Commands;

use App\Imports\WatchImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class import_watches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watches:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Watches import to website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        if (file_exists(storage_path('watches.json'))) {
            $tmpFile = storage_path('watches.json');
        } else {
            $tmpFile = realpath(__DIR__.'/../../../database/watches.json');
        }

        $this->info('Importing...');
        try {
            WatchImport::import($tmpFile);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        

        $this->info('Completed');
    }
}
