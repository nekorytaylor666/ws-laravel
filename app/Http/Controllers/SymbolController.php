<?php

namespace App\Http\Controllers;

use App\Symbol;
use Illuminate\Http\Request;

class SymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $symbols = Symbol::all();
        $res = [];
        foreach ($symbols as $symbol) {
            array_push($res, [
                "id"=>$symbol->id,
                "name"=>$symbol->name,
                "path"=> env('APP_URL').'/storage'.'/'.$symbol->name.'.png'
            ]);
        }
        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request -> hasFile('image')){
            $file = $request -> file('image');
            $original_name = $file -> getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $name = $original_name;
            $path = $file->storeAs('public',$name);
            if($path) {
                return ['status' => 'success', 'image'=>'/storage'.$name];
            } else {
                return ['status' => 'error'];
            }
        } else {
            return 'error';
        }

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
