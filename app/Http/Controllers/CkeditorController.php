<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CkeditorController extends Controller
{
    public function upload(Request $request): JsonResponse
    {
        // CKEditor gửi file qua key 'upload'
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            
            // Lấy tên file gốc và tạo tên mới để tránh trùng lặp
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Di chuyển file vào thư mục public/uploads
            $file->move(public_path('uploads/content'), $fileName);

            // Trả về URL cho CKEditor theo đúng format yêu cầu
            $url = asset('uploads/content/' . $fileName);

            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'Không thể tải ảnh lên.']
        ]);
    }
}
