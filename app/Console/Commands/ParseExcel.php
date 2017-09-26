<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Excel;

class ParseExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $url = $this->ask('please input file full path');
        Excel::load($url)->get()
            ->each(function ($item) {
                logger($item);
            });
        $this->info('you can see the laravel.log now');
    }
}
