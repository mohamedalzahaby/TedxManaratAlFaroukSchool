<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use PDF;

class ItemController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $items = DB::table("posts")->get();
        view()->share('items',$items);

        // dd($request);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
}
