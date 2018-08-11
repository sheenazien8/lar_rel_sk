<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Lesson;
use App\Models\Passport;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /*Menggunakan eager loading untuk load lebih cepat karena di sudah menyiapkan data di belakang*/
        // $user = User::with(['forums' => function($query){
        //     /*Untuk menggunakan query tambahan*/
        //     $query->where('judul', 'like', '%jep%');
        // }])->where('id',$id)->first();
        
        $user = User::with('forums.tags', 'lessons')->where('id',$id)->first();

        return view('user.profile', ['user' => $user]);
    }
    public function showPassport($id)
    {
        return view('user.passport', ['passport' => Passport::findOrFail($id)]);
    }

    public function showLessons($id)
    {
        return view('user.lesson', ['lesson' => Lesson::findOrFail($id)]);
    }

    public function showForums($id)
    {
        return view('user.forum', ['forum' => Forum::findOrFail($id)]);
    }

}