<?php

return [
    'required' => ':attribute không được để trống',
    'email' => ':attribute không hợp lệ',
    'confirmed' => 'Xác nhận mật khẩu không khớp',
    'unique' => ':attribute đã tồn tại',
    'exists' => ':attreibute không tồn tại',
    'regex' => ':attribute không hợp lệ',
    'image' => 'Không đúng định dạng ảnh',
    'mimes' => 'Ảnh không đúng định dạng :mimes',

    'min' => [
        'string' => ':attribute ít nhất :min kí tự'
    ],

    'max' => [
        'string' => ':attribute tối đa :max kí tự',
        'file' => ':attribute tối đa :max'
    ],

    'attributes' => [
        'email' => 'Email',
        'password' => 'Mật khẩu',
        'name' => 'Tên',
        'current_password' => 'Mật khẩu hiện tại',
        'slug' => 'Slug',
        'desc' => 'Mô tả',
        'title' => 'Tiêu đề',
        'category_id' => 'Danh mục',
        'file' => 'File',
        'post-file-id' => 'Ảnh bài viết',
        'product-file-id' => 'Ảnh sản phẩm',
        'old-post-file-id' => 'Ảnh bài viết',
        'old-product-file-id' => 'Ảnh sản phẩm',
        'code' => 'Mã',
        'price' => 'Giá'
    ]
];
