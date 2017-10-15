<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WalletTransaction extends Model
{
    use Notifiable;
    
    protected $guarded = [];

    protected $table = 'wallet_transaction';

    public function source(){
        return $this->belongsTo(Wallet::Class, 'source_wallet');
    }

    public function destination(){
        return $this->belongsTo(Wallet::Class, 'recipient_wallet');
    }

}
