<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    function denganRedis() {
        $users = Redis::get('users');

        if (!$users) {
            $users = User::paginate(10);
            Redis::set('users', $users);
        } else {
            try {
                // Jika data tersedia di Redis, langsung gunakan data tersebut
                $users = unserialize($users);
            } catch (\Throwable $e) {
                // Penanganan kesalahan jika deserialisasi gagal
                // Misalnya, menghapus data yang tidak valid dari cache
                Redis::del('users');
                // Kemudian, lakukan pengambilan ulang data dari database
                $users = User::paginate(10);
                Redis::set('users', $users);
            }
        }
        return view('dengan-redis', compact('users'));
    }
    function tanpaRedis() {
        $users = User::latest()->paginate(10);
        return view('tanpa-redis',compact('users'));
    }
}
