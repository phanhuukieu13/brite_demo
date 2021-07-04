<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'phone_number' , 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'user_delete',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rules($id = null){
        $rule =[

            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users,email,' .$id ,
            'password' => 'required|min:6',
            'address'=>'required|max:255|',
            'phone_number' => 'required|max:15'
        ];
        return $rule;
    }
    public function messages(){
        $messages = [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên quá dưới 3 ký tự',
            'name.max' => 'Tên không được quá 255 ký tự',

            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email trùng' ,

            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được dưới 6 ký tự',

            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ ..',
            'phone_number.required' => 'Số điện thoại khôgn được để trống',
            'phone_number.max'  => 'Số điện thoại ...'
         ];
        return $messages;
    }
    public function getUser(){
        $user = User::where(['user_delete' => 0]);
        return $user;
    }

    public function getUserById($id) {
        $user = User::where([
            'user_delete' => 0,
            'id' => $id
        ])->first();
        return $user;
    }
   

}
