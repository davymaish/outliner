<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OutlinerItem;

class SyncOutlinerItems extends Command
{
    protected $signature = 'sync:outliner-items';

    protected $description = 'Synchronize outliner items with cloud server';

    public function handle()
    {
        OutlinerItem::all()->each(function ($item) {
            $item->syncToCloud();
        });

        OutlinerItem::on('pgsql_cloud')->all()->each(function ($item) {
            $item->syncToLocal();
        });
    }
}
