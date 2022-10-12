<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Shop;
use App\Like;
use App\Genre;
use Illuminate\Support\Str;
class ShopController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Shop::class, 'shop');
    // }
    
    public function top()
    {
        return view('top');
    }
    
    public function serch(Genre $genre)
    {
        return view('shop.index')->with(['genres' => $genre->get()]);
    }
    
    
    // public function serch()
    // {
    //     return view('random/serch');
    // }
    
    public function show()
    {
        return view('shop/show');
    }
    public function showall(Shop $shop)
    {
        $like=Like::where('shop_id', $shop->id)->where('user_id', auth()->user()->id)->first();
        
        
        return view('shop/showall')->with(['shop' => $shop, 'like'=>$like]);
    }
    
    public function createShow(Genre $genre)
    {

        // dd($genre->get());
        return view('shop.create')->with(['genres' => $genre->get()]);
    }
    
    public function create(Shop $shop, ShopRequest $request)
    {
        
    //     $image = $request->file('image');
        
    //     $path = isset($image) ? $image->store('shops', 'public') : '';
    //     dd($path);
    //   $shop = Shop::create([
    //         'name' => $request->name,
    //         'money' => $request->money,
    //         'path' => $path,
    //         ]);
    //     dd($shop);
   
         $filename = $request->image->getClientOriginalName();

        //画像を保存して、そのパスを$imgに保存　第三引数に'public'を指定
       
        $input_shop = $request['shop'];
        $input_genres = $request->genres_array;
        $shop->fill($input_shop);
        $shop->genres()->attach($input_genres);
        // $file_path = $request->image->getClientOriginalName();
        // $img = $request->image->storeAs('', $file_path,'public');
        
        // $picture = new Picture(['path' =>$img ]);
        // dd($picture);
      
         $shop->image = $request->image->storeAs('',$filename,'public');
    //   dd($shop);
        $shop->save();
        
        // $file_path = \DB::table('file_path')->
        
        // $shop->pictures()->attach($picture);
        
          
        
       
        
        //  dd($shop);
        return redirect('/shop/show/' . $shop->id);
    }
    
    public function edit(Shop $shop,Genre $genre)
    {
        return view('shop.edit')->with(['shop' => $shop, 'genres' => $genre->get()]);
    }
    
    public function update(Shop $shop, ShopRequest $request)
    {
        $input_edit = $request['shop'];
        $input_editgenres = $request->genres_array;
        $shop->fill($input_edit)->save();
         $shop->genres()->attach($input_editgenres);
      
        return redirect('/shop/show/' . $shop->id);
    }
    
    public function destory(Shop $shop)
    {
        $shop->delete();
        return redirect('/');
    }
}
