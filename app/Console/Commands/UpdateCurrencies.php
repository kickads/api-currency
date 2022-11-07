<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\V1\CurrencyDataApiController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UpdateCurrencies extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'update:currencies';
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Actualiza todos los tipo de cambio de la tabla Currency';
	
	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		(new CurrencyDataApiController())->store();
	}
}