<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belege extends Model
{
    use HasFactory;

    protected $table = 'Belege';

    protected $perPage = 20;

    protected CONST MENU_COUNT = 4;

    static public function getMenus(){

    	$userBeleges = auth()->user()->beleges();

    	$menus = $userBeleges->select('Belegart', \DB::raw('count(*) as count'))
    	         ->groupBy('Belegart')->orderBy('count','DESC')
    	         ->pluck('Belegart')->toArray();

         $dMenus = [];
    	 if(count($menus) > self::MENU_COUNT){
            $dMenus = array_slice($menus, self::MENU_COUNT, count($menus));
            $menus = array_slice($menus, 0,self::MENU_COUNT);
    	 }        

    	 return [$menus,$dMenus];
    }
}
