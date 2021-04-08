<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\items;
use App\categories;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
        $show = DB::table('items')->join('categories','categories.category_id','=','items.category_id')
                                  ->select('id','items.item_name','categories.category_name','items.item_price','item_qty')
                                  ->get();
        return view('home',compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = categories::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new items;
        $item->item_name = $request->get('name');
        $item->item_price = $request->get('price');
        $item->category_id = $request->get('category');
        $item->item_qty = $request->get('stock');
        $item->save();
        return redirect('home')->with('success','Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $map = items::find($id);
        $item = categories::all();
        return view('edit',compact('item','map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = items::find($id);
        $item->item_name = $request->get('name');
        $item->item_price = $request->get('price');
        $item->category_id = $request->get('category');
        $item->item_qty = $request->get('stock');
        $item->save();
        return redirect('home')->with('success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        items::destroy($id);
        return redirect('home')->with('success','Data berhasil dihapus!');
    }
}
