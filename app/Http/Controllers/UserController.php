<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
	public function getDanhSach(){
		$user = User::all();
		return view('admin.user.danhsach', ['user'=>$user]);
	}

	public function getThem(){
		return view('admin.user.them');
	}

	public function postThem(Request $request){
		$this->validate($request, 
			[
				'name'=>'required|min:3',
				'email'=>'required|email|unique:users,email',
				'password'=>'required|min:3|max:32',
				'passwordAgain'=>'required|same:password'
			],
			[
				'name.required'=>'Bạn chưa nhập tên người dùng',
				'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
				'email.required'=>'Bạn chưa nhập email',
				'email.email'=>'Bạn chưa nhập đúng định dạng email',
				'email.unique'=>'Email đã tồn tại',
				'password.required'=>'Bạn chưa nhập mật khẩu',
				'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
				'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
				'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
			]
		);

		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->quyen = $request->quyen;
		$user->save();

		return redirect('admin/user/them')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id){
		$user = User::find($id);
		return view('admin.user.sua', ['user'=>$user]);
	}

	public function postSua(Request $request, $id){
		$this->validate($request, 
			[
				'name'=>'required|min:3',
			],
			[
				'name.required'=>'Bạn chưa nhập tên người dùng',
				'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
			]
		);

		$user = User::find($id);
		$user->name = $request->name;
		$user->quyen = $request->quyen;

		if ($request->has('changePassword')) {     // if( $request->has('changePassword') ) ----- if ($request->changePassword == "on")
			$this->validate($request, 
				[
					'password'=>'required|min:3|max:32',
					'passwordAgain'=>'required|same:password'
				],
				[
					'password.required'=>'Bạn chưa nhập mật khẩu',
					'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
					'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
					'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
					'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
				]
			);
			$user->password = bcrypt($request->password);
		}
		$user->save();

		return redirect('admin/user/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id){
		$user = User::find($id);
		$user->delete();

		return redirect('admin/user/danhsach')->with('thongbao','Xóa người dùng thành công');
	}

	public function getDangnhapAdmin(){
		return view('admin.login');
	}

	public function postDangnhapAdmin(Request $request){
		$this->validate($request,
			[
				'email'=>'required',
				'password'=>'required|min:3|max:32'
			],
			[
				'email.required'=>'Bạn chưa nhập Email',
				'password.required'=>'Bạn chưa nhập password',
				'password.min'=>'Password không được dưới 3 ký tự',
				'password.max'=>'Password không được nhiều hơn 32 ký tự'
			]
		);

		if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
			return redirect('admin/theloai/danhsach');
		}else{
			return redirect('admin/dangnhap')->with('thongbao', 'Đăng nhập không thành công');
		}
	}

	public function getDangXuatAdmin(){
		Auth::logout();
		return redirect('admin/dangnhap');
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
