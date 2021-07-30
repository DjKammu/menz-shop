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
        $user =  Auth::user();

        $beleges = $user->beleges()
                   //->where('Volltext', 'like', "%$search%")
                   ->paginate( (new Belege())->perPage);

         $dBeleges = [];
        foreach (@$beleges as $key => $belege) {
             $dBeleges[$belege['Belegart']][] = $belege;
         }           

        @array_multisort(array_map('count', $dBeleges), SORT_DESC, $dBeleges);

       // $rechnung = $beleges->where('Belegart',self::INVOICE)->all();
        //$lieferschein = $beleges->where('Belegart',self::DOC_TYPE)->all();

        return view('home',compact('beleges','dBeleges'));
        //return view('home');
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

    public function belege(Request $request,$slug){
        $user =  Auth::user();
     
        $beleges = $user->beleges()
                  ->whereBelegart(ucfirst($slug));

        if($request->filled('d')){
            $beleges->orderBy('Dateidatum',$request->d);
        }          
        $beleges = $beleges->paginate( (new Belege())->perPage);

        return view('beleges',compact('beleges'));
    }

    public function search(Request $request,$search = '' ){

        $user =  Auth::user();

        $beleges = $user->beleges()
                   ->where('Volltext', 'like', "%$search%")
                   ->paginate( (new Belege())->perPage);

         $dBeleges = [];
        foreach (@$beleges as $key => $belege) {
             $dBeleges[$belege['Belegart']][] = $belege;
         }           

        @array_multisort(array_map('count', $dBeleges), SORT_DESC, $dBeleges);

       // $rechnung = $beleges->where('Belegart',self::INVOICE)->all();
        //$lieferschein = $beleges->where('Belegart',self::DOC_TYPE)->all();

        return view('search',compact('search','beleges','dBeleges'));
    }


    public function download(Request $request,$id ){

        $user =  Auth::user();

        $file = @$user->beleges()
                   ->where('Belegnummer', $id)
                   ->pluck('Binaerdaten')->first();

        header("Content-length: ".strlen($file));
        header("Content-type: application/pdf");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header("Content-Disposition: attachment; filename=".now().$id.'.pdf');
        echo $file;
        exit();
            
    }

    public function view(Request $request,$id ){

        $user =  Auth::user();

        $file = @$user->beleges()
                   ->where('Belegnummer', $id)
                   ->pluck('Binaerdaten')->first();
        header("Content-length: ".strlen($file));
        header("Content-type: application/pdf");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        echo $file;
        exit();

    }

}
