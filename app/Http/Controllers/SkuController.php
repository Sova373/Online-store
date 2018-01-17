<?php

namespace App\Http\Controllers;

use App\Sku;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    /**
     * View all products
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getByAttributes(Request $request)
    {
        $sku = Sku::where('size', '=', $request->get('size'))
            ->where('color', '=', $request->get('color'))
            ->first();

        return $sku;
    }
}
