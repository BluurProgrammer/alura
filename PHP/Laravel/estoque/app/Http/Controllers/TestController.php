<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use Carbon;

class TestController extends Controller
{
    public function hora() {
    	$mytime = Carbon\Carbon::now();
		echo $mytime->toDateTimeString().'<br/>';

		$trialExpires = $mytime->addDays(365);
		echo $trialExpires;
    }
}
