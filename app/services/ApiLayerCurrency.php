<?php

namespace App\services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use stdClass;

class ApiLayerCurrency
{
	public string $urlApiLayer    = 'https://api.apilayer.com/currency_data/change';
	public string $urlDolarHoy    = 'https://www.dolarsi.com/api/api.php?type=valoresprincipales';
	public string $apikeyApiLayer = 'styFEhCUbjKz1iR4a27L6rUabUHW5vEx';
	
	public function getExchangeRate(): object|array
	{
		$exchangeRate          = $this->getApiLayerExchangeRate()->quotes;
		$exchangeRate->USDBLUE = $this->getDolarHoyExchangeRate();
		
		return $exchangeRate;
	}
	
	public function getApiLayerExchangeRate(): object|array
	{
		return Http::get($this->urlApiLayer, [
			'apikey'     => $this->apikeyApiLayer,
			'start_date' => date('Y-m-d'),
			'end_date'   => date('Y-m-d'),
			'currencies' => 'MXN,COP,EUR,BRL,GBP,ARS'
		])->object();
	}
	
	public function getDolarHoyExchangeRate(): stdClass
	{
		$exchangeRateDolarHoy = Http::withOptions([
			'verify' => false
		])->get($this->urlDolarHoy)->object();
		
		$exchangeRateDolarBlue = new stdClass();
		
		foreach ($exchangeRateDolarHoy as $i => $item) {
			if ($item->casa->nombre === 'Dolar Blue') {
				$exchangeRateDolarBlue->start_rate = (int)$item->casa->compra;
				$exchangeRateDolarBlue->end_rate   = (int)$item->casa->venta;
				$exchangeRateDolarBlue->change     = 0;
				$exchangeRateDolarBlue->change_cpc = 0;
			}
		}
		
		return $exchangeRateDolarBlue;
	}
}