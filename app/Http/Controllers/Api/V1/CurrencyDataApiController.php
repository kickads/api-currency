<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Currencies;
use App\services\ApiLayerCurrency;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrencyDataApiController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return JsonResponse
	 */
	public function store()
	{
		$exchangeRates = (new ApiLayerCurrency)->getExchangeRate();
		
		$currencies = Currencies::create([
			'ARS'      => $exchangeRates->USDARS->start_rate,
			'ARS_BLUE' => $exchangeRates->USDBLUE->start_rate,
			'EUR'      => $exchangeRates->USDEUR->start_rate,
			'BRL'      => $exchangeRates->USDBRL->start_rate,
			'GBP'      => $exchangeRates->USDGBP->start_rate,
			'MXN'      => $exchangeRates->USDMXN->start_rate,
			'COP'      => $exchangeRates->USDCOP->start_rate,
		]);
		
		return response()->json($currencies);
	}
}
