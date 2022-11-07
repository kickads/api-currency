<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
	use HasFactory;

	protected $fillable = ['ARS', 'ARS_BLUE', 'EUR', 'BRL', 'GBP', 'MXN', 'COP'];
    protected $table = "currency";
    public $timestamps = false;

}
