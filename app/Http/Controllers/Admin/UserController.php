<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy trường sắp xếp và hướng sắp xếp từ query string
        $sortField = $request->get('sort', 'id'); // Mặc định sắp xếp theo 'id'
        $sortDirection = $request->get('direction', 'asc'); // Mặc định sắp xếp tăng dần

        // Lấy danh sách người dùng và sắp xếp theo trường và hướng đã chọn
        $users = User::orderBy($sortField, $sortDirection)->paginate(10);

        return view('admin.users.index', compact('users', 'sortField', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create'); // Return the view for the create form
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user', // Validate role
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        \Log::info('Start creating user.', ['email' => $request->email]);

        // Create the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save(); // Save the user

        \Log::info('User created successfully.', ['user_id' => $user->id]);

        // Handle UserMeta (phone, address, role)
        $userMeta = new UserMeta();
        $userMeta->user_id = $user->id;
        $userMeta->phone = $request->phone;
        $userMeta->address = $request->address;
        $userMeta->role = $request->role;  // Store role in user_meta

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $userMeta->image = $imagePath;  // Store image in user_meta
        } else {
            // Nếu không có ảnh, đặt thumbnail thành giá trị mặc định
            $userMeta['image'] = 'default-avatar.png';
            Log::info('No image uploaded. Using default thumbnail.');
        }


        $userMeta->save(); // Save the user meta (including role and image)

        Log::info('UserMeta created successfully.', ['user_id' => $user->id]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
    public function update(UpdateUserRequest $request, $id)
    {
        Log::info('Start updating user.', ['user_id' => $id]);

        // Tìm người dùng theo ID
        try {
            $user = User::findOrFail($id);
            Log::info('User found.', ['user_id' => $user->id, 'user_email' => $user->email]);
        } catch (\Exception $e) {
            Log::error('User not found.', ['user_id' => $id, 'error' => $e->getMessage()]);
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        // Cập nhật tên người dùng nếu thay đổi
        if ($request->name !== $user->name) {
            Log::info('Name updated.', ['user_id' => $user->id, 'old_name' => $user->name, 'new_name' => $request->name]);
            $user->name = $request->name;
        }

        // Nếu có mật khẩu mới, hash và lưu vào cơ sở dữ liệu
        if ($request->password) {
            $user->password = Hash::make($request->password);
            Log::info('Password updated for user.', ['user_id' => $user->id]);
        }

        // Xử lý hình ảnh nếu có
        if ($request->hasFile('image')) {
            Log::info('Image uploaded for user.', ['user_id' => $user->id]);

            // Xóa ảnh cũ nếu có
            $userMeta = $user->userMeta;
            if ($userMeta->image && \Storage::exists('public/' . $userMeta->image)) {
                Log::info('Deleting old image.', ['user_id' => $user->id, 'image' => $userMeta->image]);
                \Storage::delete('public/' . $userMeta->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('images/users', 'public');
            $userMeta->image = $imagePath;

            Log::info('New image saved.', ['user_id' => $user->id, 'image_path' => $imagePath]);
        }

        // Lưu thông tin người dùng
        $user->save();
        Log::info('User saved successfully.', ['user_id' => $user->id]);

        // Cập nhật thông tin người dùng meta (phone, address, role)
        $userMeta = $user->userMeta;
        Log::info('UserMeta found.', ['user_id' => $user->id, 'current_phone' => $userMeta->phone, 'current_address' => $userMeta->address, 'current_role' => $userMeta->role]);

        // Cập nhật thông tin meta
        $userMeta->phone = $request->phone;
        $userMeta->address = $request->address;
        $userMeta->role = $request->role;
        Log::info('UserMeta updated.', [
            'user_id' => $user->id,
            'new_phone' => $userMeta->phone,
            'new_address' => $userMeta->address,
            'new_role' => $userMeta->role
        ]);

        // Lưu thông tin người dùng meta
        $userMeta->save();
        Log::info('UserMeta saved successfully.', ['user_id' => $user->id]);

        // Quay lại trang danh sách người dùng với thông báo thành công
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('userMeta')->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::with('userMeta')->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userMeta = $user->userMeta; // Retrieve associated user meta (may be null)

        // Check if userMeta exists before attempting to delete image
        if ($userMeta) {
            // Delete associated image from storage if it exists
            if ($userMeta->image && \Storage::exists('public/' . $userMeta->image)) {
                Storage::delete('public/' . $userMeta->image);
            }

            // Delete the associated user meta
            $userMeta->delete();
        }

        // Delete the user record
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

}
