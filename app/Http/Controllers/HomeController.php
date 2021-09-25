<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Belege;
use Auth;
use Carbon\Carbon;

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

        $beleges = $user->beleges();
                   //->where('Volltext', 'like', "%$search%")
         
         if(request()->filled(['start','end'])){
           
             $start = Carbon::parse(request()->start)->format('Y-m-d');
             $end = Carbon::parse(request()->end)->format('Y-m-d');

             $beleges->whereRaw("STR_TO_DATE(LEFT(filedate,LOCATE(' ',filedate)),'%d.%m.%Y') BETWEEN '$start' AND '$end'");

         }

        if(request()->filled('d')){
            $beleges->orderBy('filedate',request()->d);
        }elseif (request()->filled('b')) {
           $beleges->orderBy('number',request()->b);
        }          
        $beleges = $beleges->paginate( (new Belege())->perPage);   


        $dBeleges = [];
        foreach (@$beleges as $key => $belege) {
             $dBeleges[$belege['doctype']][] = $belege;
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
                  ->whereDoctype(ucfirst($slug));
        
        if(request()->filled(['start','end'])){
           
             $start = Carbon::parse(request()->start)->format('Y-m-d');
             $end = Carbon::parse(request()->end)->format('Y-m-d');

             $beleges->whereRaw("STR_TO_DATE(LEFT(filedate,LOCATE(' ',filedate)),'%d.%m.%Y') BETWEEN '$start' AND '$end'");

         }


        if($request->filled('d')){
            $beleges->orderBy('filedate',$request->d);
        }elseif ($request->filled('b')) {
           $beleges->orderBy('number',$request->b);
        } 

        $beleges = $beleges->paginate( (new Belege())->perPage);

        return view('beleges',compact('beleges'));
    }

    public function search(Request $request,$search = '' ){

        $user =  Auth::user();

        $beleges = $user->beleges()
                   ->where('content', 'like', "%$search%");
        
        if(request()->filled(['start','end'])){
           
             $start = Carbon::parse(request()->start)->format('Y-m-d');
             $end = Carbon::parse(request()->end)->format('Y-m-d');

             $beleges->whereRaw("STR_TO_DATE(LEFT(filedate,LOCATE(' ',filedate)),'%d.%m.%Y') BETWEEN '$start' AND '$end'");

         }
                    
        if($request->filled('d')){
            $beleges->orderBy('filedate',$request->d);
        }elseif ($request->filled('b')) {
           $beleges->orderBy('number',$request->b);
        }

        $beleges = $beleges->paginate( (new Belege())->perPage);           

         $dBeleges = [];
        foreach (@$beleges as $key => $belege) {
             $dBeleges[$belege['doctype']][] = $belege;
         }           

        @array_multisort(array_map('count', $dBeleges), SORT_DESC, $dBeleges);

       // $rechnung = $beleges->where('Belegart',self::INVOICE)->all();
        //$lieferschein = $beleges->where('Belegart',self::DOC_TYPE)->all();

        return view('search',compact('search','beleges','dBeleges'));
    }


    public function download(Request $request,$id ){

        $file = $this->getFile($id); 

        $binFile = @$file->docBinary->bin;

        header("Content-length: ".strlen($binFile));
        header("Content-type: application/pdf");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header("Content-Disposition: attachment; filename=".Carbon::parse($file->filedate)->format('d.m.Y').'-'.
            $file->doc_number.'.pdf');
        echo $binFile;
        exit();
            
    }
   
    public function getFile($id){

        $user =  Auth::user();
        $file = @$user->beleges()
                   ->where('number', $id)
                   ->with('docBinary')->first();

        return ($file->exists()) ?  $file : [];           

    }


    public function view(Request $request,$id ){

        $file = $this->getFile($id);        
        $file = @$file->docBinary->bin;      
        header("Content-length: ".strlen($file));
        header("Content-type: application/pdf");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        echo $file;
        exit();

    }

}
