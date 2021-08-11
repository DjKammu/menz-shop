<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belege extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $perPage = 20;

    protected CONST MENU_COUNT = 4;

    static public function getMenus(){
        
         $menus = $dMenus = [];
        if(!auth()->check()){
            return [$menus,$dMenus];
        }

    	$userBeleges = auth()->user()->beleges();

    	$menus = $userBeleges->select('doctype', \DB::raw('count(*) as count'))
    	         ->groupBy('doctype')->orderBy('count','DESC')
    	         ->pluck('doctype')->toArray();

       
    	 if(count($menus) > self::MENU_COUNT){
            $dMenus = array_slice($menus, self::MENU_COUNT, count($menus));
            $menus = array_slice($menus, 0,self::MENU_COUNT);
    	 }        

    	 return [$menus,$dMenus];
    }

    public function docBinary(){

        return $this->hasOne(DocumentBinary::class,'id','id');
    }
}
