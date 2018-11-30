<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
	public function getDanhSach(){
		$slide = Slide::all();
		return view('admin.slide.danhsach', ['slide'=>$slide]);
	}

	public function getThem(){
		return view('admin.slide.them');
	}

	public function postThem(Request $request){
		$this->validate($request,
			[
				'Ten'=>'required',
				'NoiDung'=>'required',
			],
			[
				'Ten.required'=>'Bạn chưa nhập tên',
				'NoiDung.required'=>'Bạn chưa nhập nội dung'
			]
		);

		$slide = new Slide;
		$slide->Ten = $request->Ten;
		$slide->NoiDung = $request->NoiDung;
		if ($request->has('link')) {
			$slide->link = $request->link;
		}

    	if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
    	{
    		$file = $request->file('Hinh');  // Nhận file hình ảnh người dùng upload lên server
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect("admin/slide/them")->with("loi", "Bạn chỉ được chọn file có đuôi jpg, png, jpeg");
    		}
    		$name = $file->getClientOriginalName();  // Lấy tên của file hình ảnh
    		$Hinh = str_random(4)."_".$name;
    		while (file_exists("public/upload/slide/".$Hinh)) {
    			$Hinh = str_random(4)."_".$name;
    		}
    		$file->move("public/upload/slide",$Hinh);
    		$slide->Hinh = $Hinh;
    	}
    	else{
			$slide->Hinh = ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng
    	}
    	$slide->save();
    	return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id){
		$slide = Slide::find($id);
		return view('admin.slide.sua', ['slide'=>$slide]);
	}

	public function postSua(Request $request, $id){
		$this->validate($request,
			[
				'Ten'=>'required',
				'NoiDung'=>'required',
			],
			[
				'Ten.required'=>'Bạn chưa nhập tên',
				'NoiDung.required'=>'Bạn chưa nhập nội dung'
			]
		);

		$slide = Slide::find($id);
		$slide->Ten = $request->Ten;
		$slide->NoiDung = $request->NoiDung;
		if ($request->has('link')) {
			$slide->link = $request->link;
		}

    	if($request->hasFile('Hinh')) // Kiểm tra xem người dùng có upload hình hay không
    	{
    		$file = $request->file('Hinh');  // Nhận file hình ảnh người dùng upload lên server
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect("admin/slide/them")->with("loi", "Bạn chỉ được chọn file có đuôi jpg, png, jpeg");
    		}
    		$name = $file->getClientOriginalName();  // Lấy tên của file hình ảnh
    		$Hinh = str_random(4)."_".$name;
    		while (file_exists("public/upload/slide/".$Hinh)) {
    			$Hinh = str_random(4)."_".$name;
    		}
    		unlink("public/upload/slide/".$slide->Hinh);
    		$file->move("public/upload/slide",$Hinh);
    		$slide->Hinh = $Hinh;
    	}
    	$slide->save();
    	return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id){
		$slide = Slide::find($id);
		$slide->delete();

		return redirect('admin/slide/danhsach')->with('thongbao', 'Xóa thành công');
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
