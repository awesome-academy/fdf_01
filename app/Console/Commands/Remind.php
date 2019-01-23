<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\Order;
use App\Notifications\RemindOrder;

class Remind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail after 5 PM if have order';

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
        $orderPending = Order::where('status', config('setting.not_progress'))->get();
        if(count($orderPending) > config('setting.default'))
        {
            $countOrder = count($orderPending);
            $adminOrder = User::where('role', config('setting.admin'))->get();
            \Notification::send($adminOrder, new RemindOrder($countOrder));
        }
    }
}
