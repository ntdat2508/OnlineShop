<?php

namespace App\Utilities;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Common {

    public static function uploadFile($file, $path)
    {
        // Tạo tên tệp mới duy nhất
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Lưu tệp vào thư mục storage/app/public/front/img/products
        $file->storeAs('public/' . $path, $fileName);

        // Trả về đường dẫn đến tệp đã lưu (đường dẫn truy cập từ public)
        return 'storage/' . $path . '/' . $fileName;
    }
}