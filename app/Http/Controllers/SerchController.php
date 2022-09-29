<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class SerchController extends Controller
{
     public function showserch(Request $request)  //予算以下の検索をする
    {
         $keyword_money = $request->money;
        
         if($keyword_money) {
             $query = Shop::query();
             $shops = $query->where('money','<=', $keyword_money)->get();
    
             $message = $keyword_money."円以下の検索が完了しました。";
             return view('shop')->with([
                 'shops' => $shops,
                 'message' => $message,
                 ]);
         }

         else {
             $message = "検索結果はありません。";
             return view('/serch')->with(['message' => $message]);
         }
    }
    
    
     public function randomshow(Request $request)  //プランを検索するときにランダムで3個データを取ってくる
    {
        $keyword_money_random = $request->money;
        
        $integer = intval($keyword_money_random);
        $check = 0;
        
        while( $check == 0) {
        
         if($keyword_money_random) {
             $query = Shop::query();
             $randoms = $query->where('money','<=', $keyword_money_random)->get();
             if($randoms->count() >= 3) {
                 $randoms = $randoms->random(3);
             }else{
                 $randoms = null;
             }
            
           
            
            $sho = ($randoms)->toArray();
            $shops_total = array_sum(array_column($sho, 'money'));
         
              if( $shops_total <= $integer){
                  $check = 1;
                 
              }else{
                  $check = 0;
              }
            
             dump($check);
             
             $message_random = $keyword_money_random."円以下の検索が完了しました。";
             return view('random/random')->with([
                 'randoms' => $randoms,
                 'total' => $shops_total,
                 'message_random' => $message_random,
                 ]);
         }

        //  else {
        //      $message = "検索結果はありません。";
        //      return view('/serch')->with(['message' => $message]);
        //  }
    }
}
}