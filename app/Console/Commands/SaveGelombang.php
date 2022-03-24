<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\PerairanGelombangToday;
use App\PerairanGelombangH1;
use App\PerairanGelombangH2;
use App\PerairanGelombangH3;

class SaveGelombang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:gelombang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save data Gelombang BMKG to DB';

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
        $url = "https://peta-maritim.bmkg.go.id/public_api/overview/gelombang.json";
        $waves = (array)json_decode(file_get_contents($url));
        $keys = array_keys($waves);

        foreach ($keys as $key) 
        {
            $today = PerairanGelombangToday::where('wp_1',$key)->first();
            // dd(env('DB_SCHEMA'));
            $today->issued = $waves[$key]->issued;
            $today->kondisi = $waves[$key]->today;
            $today->created_at = date("Y-m-d H:i:s");
            $today->save();

            $h1 = PerairanGelombangH1::where('wp_1',$key)->first();
            $h1->issued = $waves[$key]->issued;
            $h1->kondisi = $waves[$key]->tommorow;
            $h1->created_at = date("Y-m-d H:i:s");
            $h1->save();

            $h2 = PerairanGelombangH2::where('wp_1',$key)->first();
            $h2->issued = $waves[$key]->issued;
            $h2->kondisi = $waves[$key]->h2;
            $h2->created_at = date("Y-m-d H:i:s");
            $h2->save();

            $h3 = PerairanGelombangH3::where('wp_1',$key)->first();
            $h3->issued = $waves[$key]->issued;
            $h3->kondisi = $waves[$key]->h2;
            $h3->created_at = date("Y-m-d H:i:s");
            $h3->save();
        }
    }
}
