<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Lesson;
use App\Models\City;
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

        /*
        has many through merelasikan table yang tidak mempunyai hubungan langsung
        mengaakses forums yang dipunyai oleh user id satu
        */
        /*akses forum menggunakan id yang dipunyai user*/
        // dd(User::find($id)->forums);
        

        /*$forums = User::withCount('forums')->get();
        foreach ($forums as $forum) {
            echo $forum->name." -- ".$forum->forums_count."<br>";
        }
            withcount untuk menghitung jumlah value yang dimiliki oleh ID

        */
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

    public function createForum()
    {
        // inserting relation method
        // $forum = [
        //     new Forum([
        //             "judul" => "test forum dengan judul baru1",
        //             "body" => "test body baru atau isi yang baru banget1"
        //         ]),
        //     new Forum([
        //             "judul" => "test forum dengan judul baru2",
        //             "body" => "test body baru atau isi yang baru banget2"
        //         ]),
        //     new Forum([
        //             "judul" => "test forum dengan judul baru3",
        //             "body" => "test body baru atau isi yang baru banget3"
        //         ]),
        // ];

        $user = User::find(2);
        $user->forums()->create([
            "judul" => "test forum dengan judul terbaru",
            "body" => "test body baru atau isi yang terbaru banget"
        ]);
    }
    public function updateForum()
    {
        // update forum menggunakan relation namun method ini hanya berlaku untuk model yang mempunyai belongsto
        $forum = Forum::find(3);
        // merubah user idnya menjadi 1
        $user = User::find(1);

        $forum->user()->associate($user);
        $forum->save();
    }

    public function deleteForum()
    {
        // delete forum menggunakan relation namun method ini hanya berlaku untuk model yang mempunyai belongsto
        $forum = Forum::find(3);
        // menghapus relasi forum dengan user
        $forum->user()->dissociate();
        $forum->save();
    }

    /*Hanya berlaku untuk many to many*/
    public function createLessons()
    {   
        $user = User::find(1);
        /*attach untuk create many to many*/
        $user->lessons()->attach(3);
    }

    public function deleteLessons()
    {   
        $user = User::find(1);
        /*attach untuk create many to many*/
        $user->lessons()->detach(3);
    }

}