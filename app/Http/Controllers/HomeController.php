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
        $this->middleware('auth', ['except' => ['faq']]);
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
           
             $start = Carbon::createFromFormat('d.m.Y',request()->start)->format('Y-m-d');
             $end = Carbon::createFromFormat('d.m.Y', request()->end)->format('Y-m-d');
            
             $beleges->whereRaw("STR_TO_DATE(receiptdate,'%d.%m.%Y') BETWEEN '$start' AND '$end'");

         }
         
         $orderBy = "STR_TO_DATE(receiptdate,'%d.%m.%Y')";
            
         $order ='DESC' ;
                    
        if(request()->filled('order')){
            $orderBy = request()->filled('orderby') ? ( !in_array(request()->orderby, 
                ['receiptdate','number'] ) ? 'number' : request()->orderby ) : 'number';
            
            $order = !in_array(\Str::lower(request()->order), ['desc','asc'])  ? 'ASC' 
             : request()->order;

            $orderBy = ($orderBy == 'receiptdate') ? "STR_TO_DATE(receiptdate,'%d.%m.%Y')" : $orderBy;

        }

        $beleges->orderByRaw("$orderBy $order");

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
           
             $start = Carbon::createFromFormat('d.m.Y',request()->start)->format('Y-m-d');
             $end = Carbon::createFromFormat('d.m.Y', request()->end)->format('Y-m-d');
            
             $beleges->whereRaw("STR_TO_DATE(receiptdate,'%d.%m.%Y') BETWEEN '$start' AND '$end'");

         }


                    
        $orderBy = "STR_TO_DATE(receiptdate,'%d.%m.%Y')";
            
         $order ='DESC' ;
                    
        if(request()->filled('order')){
            $orderBy = request()->filled('orderby') ? ( !in_array(request()->orderby, 
                ['receiptdate','number'] ) ? 'number' : request()->orderby ) : 'number';
            
            $order = !in_array(\Str::lower(request()->order), ['desc','asc'])  ? 'ASC' 
             : request()->order;

            $orderBy = ($orderBy == 'receiptdate') ? "STR_TO_DATE(receiptdate,'%d.%m.%Y')" : $orderBy;

        }

        $beleges->orderByRaw("$orderBy $order");
         

        $beleges = $beleges->paginate( (new Belege())->perPage);

        return view('beleges',compact('beleges'));
    }

    public function search(Request $request ){

        $search = $request->s;

        $user =  Auth::user();

        $searchTerms = explode(' ',$search);
       

        $beleges = $user->beleges()
                    ->where(function ($q) use ($searchTerms) {
                      foreach ($searchTerms as $value) {
                        $q->where('content', 'like', "%{$value}%");
                      }
                    });
                    // ->where('content', 'like', "%$searchTerms%");

               
        if(request()->filled(['start','end'])){
           
             $start = Carbon::createFromFormat('d.m.Y',request()->start)->format('Y-m-d');
             $end = Carbon::createFromFormat('d.m.Y', request()->end)->format('Y-m-d');
            
             $beleges->whereRaw("STR_TO_DATE(receiptdate,'%d.%m.%Y') BETWEEN '$start' AND '$end'");

         }
                    
        $orderBy = "STR_TO_DATE(receiptdate,'%d.%m.%Y')";
            
         $order ='DESC' ;
                    
        if(request()->filled('order')){
            $orderBy = request()->filled('orderby') ? ( !in_array(request()->orderby, 
                ['receiptdate','number'] ) ? 'number' : request()->orderby ) : 'number';
            
            $order = !in_array(\Str::lower(request()->order), ['desc','asc'])  ? 'ASC' 
             : request()->order;

            $orderBy = ($orderBy == 'receiptdate') ? "STR_TO_DATE(receiptdate,'%d.%m.%Y')" : $orderBy;

        }

        $beleges->orderByRaw("$orderBy $order");
         
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
        header("Content-Disposition: attachment; filename=".Carbon::parse($file->receiptdate)->format('d.m.Y').'-'.
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

    public function faq(){
          return view('static.faq');
    }

}
