<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\Comment;

class TinTucController extends Controller
{
	public function getDanhSach(){
		// $tintuc = TinTuc::orderBy('id','DESC')->get();
		$tintuc = TinTuc::all();
		return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
	}

	public function getThem(){
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::all();
		return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);	
	}

	public function postThem(Request $request){
		$this->validate($request, 
			[
				'LoaiTin'=>'required',
				'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
				'TomTat'=>'required',
				'NoiDung'=>'required',
			],
			[
				'LoaiTin.required'=>'Bạn chưa chọn loại tin',
				'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
				'TieuDe.min'=>'Tiêu đề phải có ít nhất 3 ký tự',
				'TieuDe.unique'=>'Tiêu đề đã tồn tại',
				'TomTat.required'=>'Bạn chưa nhập tóm tắt',
				'NoiDung.required'=>'Bạn chưa nhập nội dung'
			]);
		$tintuc = new TinTuc;
		$tintuc->TieuDe = $request->TieuDe;
		$tintuc->TieuDeKhongDau = $this->changeTitle($request->TieuDe);
		$tintuc->idLoaiTin = $request->LoaiTin;
		$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;
		$tintuc->SoLuotXem = 0;

    	if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
    	{
    		$file = $request->file('Hinh');  // Nhận file hình ảnh người dùng upload lên server
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect("admin/tintuc/them")->with("loi", "Bạn chỉ được chọn file có đuôi jpg, png, jpeg");
    		}
    		$name = $file->getClientOriginalName();  // Lấy tên của file hình ảnh
    		$Hinh = str_random(4)."_".$name;
    		while (file_exists("public/upload/tintuc/".$Hinh)) {
    			$Hinh = str_random(4)."_".$name;
    		}
    		$file->move("public/upload/tintuc",$Hinh);
    		$tintuc->Hinh = $Hinh;
    	}
    	else{
			$tintuc->Hinh = ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng
    	}

    	$tintuc->save();

    	return redirect("admin/tintuc/them")->with("thongbao", "Thêm tin thành công");
	}

	public function getSua($id){
		$tintuc = TinTuc::find($id);
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::all();
		return view('admin.tintuc.sua', ['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
	}

	public function postSua(Request $request, $id){
		$tintuc = TinTuc::find($id);
		$this->validate($request, 
			[
				'LoaiTin'=>'required',
				'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
				'TomTat'=>'required',
				'NoiDung'=>'required',
			],
			[
				'LoaiTin.required'=>'Bạn chưa chọn loại tin',
				'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
				'TieuDe.min'=>'Tiêu đề phải có ít nhất 3 ký tự',
				'TieuDe.unique'=>'Tiêu đề đã tồn tại',
				'TomTat.required'=>'Bạn chưa nhập tóm tắt',
				'NoiDung.required'=>'Bạn chưa nhập nội dung'
			]);
		$tintuc->TieuDe = $request->TieuDe;
		$tintuc->TieuDeKhongDau = $this->changeTitle($request->TieuDe);
		$tintuc->idLoaiTin = $request->LoaiTin;
		$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;

    	if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
    	{
    		$file = $request->file('Hinh');  // Nhận file hình ảnh người dùng upload lên server
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect("admin/tintuc/them")->with("loi", "Bạn chỉ được chọn file có đuôi jpg, png, jpeg");
    		}
    		$name = $file->getClientOriginalName();  // Lấy tên của file hình ảnh
    		$Hinh = str_random(4)."_".$name;
    		while (file_exists("public/upload/tintuc/".$Hinh)) {
    			$Hinh = str_random(4)."_".$name;
    		}

    		$file->move("public/upload/tintuc",$Hinh);
    		unlink("public/upload/tintuc/".$tintuc->Hinh);
    		$tintuc->Hinh = $Hinh;
    	}

    	$tintuc->save();
    	return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Sửa thành công');
	}

	public function getXoa($id){
		$tintuc = TinTuc::find($id);
		$tintuc->delete();

		return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa thành công');
	}

	private function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
		$str=trim($str);
		if ($str=="") return "";
		$str =str_replace('"','',$str);
		$str =str_replace("'",'',$str);
		$str = $this->stripUnicode($str);
		$str = mb_convert_case($str,$case,'utf-8');
		$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
		return $str;
	}

	private function stripUnicode($str){
		if(!$str) return '';
		//$str = str_replace($a, $b, $str);
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
			'ae'=>'ǽ',
			'AE'=>'Ǽ',
			'c'=>'ć|ç|ĉ|ċ|č',
			'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
			'd'=>'đ|ď',
			'D'=>'Đ|Ď',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
			'f'=>'ƒ',
			'F'=>'',
			'g'=>'ĝ|ğ|ġ|ģ',
			'G'=>'Ĝ|Ğ|Ġ|Ģ',
			'h'=>'ĥ|ħ',
			'H'=>'Ĥ|Ħ',
			'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
			'ij'=>'ĳ',	  
			'IJ'=>'Ĳ',
			'j'=>'ĵ',	  
			'J'=>'Ĵ',
			'k'=>'ķ',	  
			'K'=>'Ķ',
			'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
			'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
			'Oe'=>'œ',
			'OE'=>'Œ',
			'n'=>'ñ|ń|ņ|ň|ŉ',
			'N'=>'Ñ|Ń|Ņ|Ň',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
			's'=>'ŕ|ŗ|ř',
			'R'=>'Ŕ|Ŗ|Ř',
			's'=>'ß|ſ|ś|ŝ|ş|š',
			'S'=>'Ś|Ŝ|Ş|Š',
			't'=>'ţ|ť|ŧ',
			'T'=>'Ţ|Ť|Ŧ',
			'w'=>'ŵ',
			'W'=>'Ŵ',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
			'z'=>'ź|ż|ž',
			'Z'=>'Ź|Ż|Ž'
		);
		foreach($unicode as $khongdau=>$codau) {
			$arr=explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
}
