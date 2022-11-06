<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Shop;
use App\Like;
use App\Genre;
use Auth;
use Illuminate\Support\Str;
class ShopController extends Controller
{
    //ログインユーザー認証
    public function __construct()
    {
        $this->authorizeResource(Shop::class, 'shop');
    }
    
    public function top()
    {
        // $shop = Shop::all();
        if( Auth::check() ){
        $shop = Shop::where('user_id', auth()->user()->id)->get();
        
        // dd($shop);
        // $shop = $shop->random(3);

        
        // return view('top')->with(['shops' => $shop]);
        return view('top')->with(['shops' => $shop]);
        }else{
        return view('top');
    }
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
        //ログインユーザー表示
        if( Auth::check() ){
        $like=Like::where('shop_id', $shop->id)->where('user_id', auth()->user()->id)->first();
        // dd($shop);
        
        //  $shops = Plan::withCount('plan_likes')->orderBy('plan_likes_count', 'desc')->get();
        return view('shop/showall')->with(['shop' => $shop, 'like'=>$like]);
        } else {
            return view('shop/showall')->with(['shop' => $shop]);
        }
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
        
   
         $filename = $request->image->getClientOriginalName();

        //画像を保存して、そのパスを$imgに保存　第三引数に'public'を指定
       
        $input_shop = $request['shop'];
        // dd($input_shop);
        $input_genres = $request->genres_array;
        $shop->fill($input_shop);
        $shop->user_id = $request->user()->id;
        $shop->image = $request->image->storeAs('',$filename,'public');
        $shop->save();
        $shop->genres()->attach($input_genres);
        // $file_path = $request->image->getClientOriginalName();
        // $img = $request->image->storeAs('', $file_path,'public');
        
        // $picture = new Picture(['path' =>$img ]);
        // dd($picture);
      
         
    //   dd($shop);
        // $shop->save();
        
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
