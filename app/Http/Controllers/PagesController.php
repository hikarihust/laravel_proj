<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\LoaiTin;
use App\Models\Slide;

class PagesController extends Controller
{
    //
    public function __construct(){
    	$theloai = TheLoai::all();
    	$slide = Slide::all();
    	view()->share('theloai', $theloai);
    	view()->share('slide', $slide);
    }

    public function trangchu(){
    	return view('pages.trangchu');
    }

    public function lienhe(){
    	return view('pages.lienhe');
    }
}
