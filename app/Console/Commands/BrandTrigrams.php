<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TeamTNT\TNTSearch\TNTSearch;

class BrandTrigrams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trigram:brand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an index of brand trigrams';

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
     * @return int
     */
    public function handle()
    {
        $this->info("Creates an index of post tags trigrams");
        $tnt = new TNTSearch;
        $driver = config('database.default');
        $config = config('scout.tntsearch') + config("database.connections.$driver");
        $tnt->loadConfig($config);
        $tnt->setDatabaseHandle(app('db')->connection()->getPdo());
        $indexer = $tnt->createIndex('brandngrams.index');
        $indexer->query('SELECT id, n_grams FROM brands;');
        $indexer->setLanguage('no');
        $indexer->run();
    }
}
