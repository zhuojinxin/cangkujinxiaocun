<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunLocal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Run:Local';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run only local';

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
        if(\App::environment() === 'local'){
            \Config::set('database.connections.mysql.port',33060);
            $this->call('ide-helper:generate');
            $this->call('ide-helper:meta');
            $this->call('ide-helper:models');
        }
        //
    }
}
