<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Belege;
use Auth;

class HomeController extends Controller
{
    CONST INVOICE = 'Rechnung';

    CONST DOC_TYPE = 'Auftrag';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();

        return view('profile',compact('user'));
    }

    public function rechnung(){
        $user =  Auth::user();

        $beleges = $user->beleges()->paginate( (new Belege())->perPage);

        return view('beleges',compact('beleges'));
    }

    public function search(Request $request,$search = '' ){

        $user =  Auth::user();

        $beleges = $user->beleges()
                   ->where('Volltext', 'like', "%$search%")
                   ->paginate( (new Belege())->perPage);

        $rechnung = $beleges->where('Belegart',self::INVOICE)->all();
        $lieferschein = $beleges->where('Belegart',self::DOC_TYPE)->all();

        return view('search',compact('search','beleges','lieferschein','rechnung'));
    }
}
