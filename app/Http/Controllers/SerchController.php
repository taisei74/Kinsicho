<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class SerchController extends Controller
{
     public function showserch(Request $request)  //予算以下の検索をする
    {
         $money = $request->money;
         $keyword_genre = $request->genre_name;
         $keyword_money = $money[0];
        //  dd($keyword_money);
         $query = Shop::query();
        $message = $keyword_money."円以下の検索が完了しました。";
        
        
        //   dd($keyword_genre);
    if(!empty($keyword_money) &&!empty($keyword_genre)) {
              $shops = $query->where('money','<=', $keyword_money)
                            ->whereHas('genres', function($q) use($keyword_genre){
                            $q->where('genre_name', 'like','%'.$keyword_genre. '%');})->paginate(10);
                            
        //   dump($shops);
            //  $message = $keyword_money."円以下の検索が完了しました。";
            //  return view('show/shop')->with([
            //      'shops' => $shops,
            //      'genre' => $genre,
            //      'message' => $message,
            //      ]);
         }elseif(!empty($keyword_money) && empty($keyword_genre)) {
            
             $shops = $query->where('money', '<=', $keyword_money)->paginate(10);
             
         }elseif(empty($keyword_money) && !empty($keyword_genre)) {
             
            //  $query_genre = Genre::query();
            //  $genres = $query_genre->where('ganre_name', 'like', '%'.$keyword_genre.'%')->paginate(10);
             $shops = $query->whereHas('genres', function($q) use($keyword_genre){
                                $q->where('genre_name', 'like','%'.$keyword_genre. '%');})->paginate(10);
                                
                                
             }
    
     

         
           return view('show/shop')->with([
                 'shops' => $shops,
                 'message' => $message,
                 ]);
         

        //  else {
        //      $message = "検索結果はありません。";
        //      return view('random/serch')->with(['message' => $message]);
        //  }
    }
    
    

    public function randomshow(Request $request)  //プランを検索するときにランダムで3個データを取ってくる
    {
        $key = $request->money;
        $keyword_money_random =  $key[0];
       
        // dd($keyword_money_random);
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
        //  print_r($shops_total);
              if( $shops_total <= $integer){
                  $check = 1;
                //   print_r('@@@@@@@@');
                //  print_r($check);
              }else{
                //   print_r('********');
                  $check = 0;
                //   dd($check);
              }
         }
            //  dump($check);
         }
             $message_random = $keyword_money_random."円以下の検索が完了しました。";
            //  print_r('11111111111');
            //  print_r($shops_total);
            //  print_r('22222222222');
            //  print_r($message_random);
             return view('random/random')->with([
                 'randoms' => $randoms,
                 'total' => $shops_total,
                 'message_random' => $message_random,
                 ]);
         

        //  else {
        //      $message = "検索結果はありません。";
        //      return view('/serch')->with(['message' => $message]);
        //  }
    }

}