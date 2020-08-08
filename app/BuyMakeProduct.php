<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class BuyMakeProduct extends Model
{
    protected $table = 'buy_make_product';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'buy_make', 'grosswt', 'pure', 'pcs', 'rate', 'qs','ms','pcs','purewt','netwt','total',
    ];


}
