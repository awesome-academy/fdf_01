<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
        'total_payment',
    ];

    public $timestamps = true;

    public function getStatusAttribute($status)
    {
        if ($status == config('setting.not_progress'))
        {

            return trans('order.not_progress');
        } else if($status == config('setting.in_delivery')) {
            
            return trans('order.in_delivery');
        } else if($status == config('setting.processed')) {

            return trans('order.processed');
        } else {
            
            return trans('order.reject');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->belongsTo(History::class);
    }

    public function detailOders()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
