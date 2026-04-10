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
        'file' => ':attribute tối đa :max',
    ],
    'between' => [
        'numeric' => ':attribute phải nằm trong khoảng từ :min đến :max',
        'integer' => ':attribute phải nằm trong khoảng từ :min đến :max'
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
        'old-post-file-id' => 'Ảnh bài viết',
        'product-file-id' => 'Ảnh sản phẩm',
        'old-product-file-id' => 'Ảnh sản phẩm',
        'slider-file-id' => 'Ảnh banner',
        'old-slider-file-id' => 'Ảnh banner',
        'code' => 'Mã',
        'price' => 'Giá',
        'sale_off' => 'Giảm giá',
        'order' => 'Số thứ tự'
    ]
];
