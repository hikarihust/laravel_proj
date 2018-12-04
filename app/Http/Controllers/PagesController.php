<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\LoaiTin;
use App\Models\Slide;
use App\Models\TinTuc;

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

    public function loaitin($id){
    	$loaitin = LoaiTin::find($id);
    	$tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
    	return view('pages.loaitin', ['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    public function tintuc($id){
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }
}
