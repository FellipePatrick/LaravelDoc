<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'value',
        'type',
        'paid',
        'payment_date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function filter(Request $request){
        
    }
}
