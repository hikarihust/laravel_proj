<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\LoaiTin;

class AjaxController extends Controller
{
	public function getLoaiTin($idTheLoai){
		$loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
		$ajaxLt = '';
		foreach ($loaitin as $lt) {
			$ajaxLt .= "<option value='". $lt->id ."'>". $lt->Ten ."</option>";
		}
		echo $ajaxLt;
	}
}
