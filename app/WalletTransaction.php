<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WalletTransaction extends Model
{
    use Notifiable;
    
    protected $guarded = [];

    protected $table = 'wallet_transaction';

}
