<?php

return [
    'required' => ':attribute không được để trống',
    'email' => ':attribute không hợp lệ',
    'confirmed' => 'Xác nhận mật khẩu không khớp',
    
    'min' => [
        'string' => ':attribute ít nhất :min kí tự'
    ],
    'max' => [
        'string' => ':attribute tối đa :max kí tự'
    ],

    'regex' => ':attribute không hợp lệ',

    'attributes' => [
        'email' => 'Email',
        'password' => 'Mật khẩu',
        'name' => 'Tên',
        'current_password' => 'Mật khẩu hiện tại'
    ]
];
