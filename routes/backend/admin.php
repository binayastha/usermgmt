<?php


Route::get('/',function (){
    dd(auth()->user()->roles->pluck('name')->first());
    return view('backend.dashboard');
});


