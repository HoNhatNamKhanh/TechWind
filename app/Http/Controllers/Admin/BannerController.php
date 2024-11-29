<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    // Display all banners
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Cập nhật banner bắt đầu', ['banner_id' => $id, 'input' => $request->all()]);

        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $banner = Banner::findOrFail($id);

            $banner->name = $request->input('name');

            if ($request->hasFile('thumbnail')) {
                $path = $request->file('thumbnail')->store('banners', 'public');
                $banner->thumbnail = $path;
            } elseif ($request->has('old_thumbnail')) {
                // If no new thumbnail, keep the old one
                $banner->thumbnail = $request->input('old_thumbnail');
            }

            $banner->save();

            Log::info('Banner cập nhật thành công', ['banner_id' => $banner->id]);

            return redirect()->route('admin.banner.index')->with('success', 'Banner cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật banner', [
                'error_message' => $e->getMessage(),
                'banner_id' => $id,
                'stack_trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Lỗi khi cập nhật banner: ' . $e->getMessage());
        }
    }
}
