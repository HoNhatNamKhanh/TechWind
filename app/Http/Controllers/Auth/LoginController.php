<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Wishlist; // Đảm bảo import model Wishlist
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * After the user is authenticated, move the wishlist from session to database.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Chuyển wishlist từ session vào database
        $wishlistItems = Session::get('wishlist', []);

        foreach ($wishlistItems as $item) {
            $wishlist = Wishlist::where('user_id', $user->id)
                ->where('product_id', $item['product_id'])
                ->where('variant_id', $item['variant_id'])
                ->first();

            if (!$wishlist) {
                // Chưa có wishlist cho sản phẩm và variant này, thêm vào database
                Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'],
                ]);
            }
        }

        // Xóa wishlist khỏi session sau khi chuyển vào database
        Session::forget('wishlist');

        // Kiểm tra vai trò người dùng và chuyển hướng
        if ($user->userMeta && $user->userMeta->role === 'admin') {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    // Ghi đè phương thức logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Chuyển hướng người dùng về trang home sau khi logout
        return redirect('/home');
    }
}
