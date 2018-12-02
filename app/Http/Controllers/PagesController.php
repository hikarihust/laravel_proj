<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\LoaiTin;

class PagesController extends Controller
{
    //
    public function __construct(){
    	$theloai = TheLoai::all();
    	view()->share('theloai', $theloai);
    }

    public function trangchu(){
    	return view('pages.trangchu');
    }

    public function lienhe(){
    	return view('pages.lienhe');
    }
}
