<?php

namespace App\Http\Controllers\Invite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function test()
    {
        dd('test');
    }

    public function index()
    {
        // dd('ok bos');
        return view('index');
    }

    public function path($path)
    {
        $data = User::where('path', $path)->first();
        if ($data) {
            $rsvp_data = $data['rsvp'];
        } else {
            $rsvp_data = 1;
        }
        return view('invite', compact('rsvp_data'));
    }

    public function store(Request $request)
    {
        $exist = User::where('path', $request->path)->first();
        if ($exist) {
            $newUser = User::find($exist['id']);
            $newUser->path = $request->path;
            $newUser->rsvp = $request->rsvp;
            $newUser->create_at = date('Y-m-d H:i:s');
            $newUser->update();
        } else {
            $newUser = new User();
            $newUser->path = $request->path;
            $newUser->rsvp = $request->rsvp;
            $newUser->create_at = date('Y-m-d H:i:s');
            $newUser->save();
        }

        $after_render = User::where('path', $request->path)->first();
        return response()->json([
            'data' => $after_render,
            'success' => true,
            'message' => 'Your success message',
        ]);
    }

    public function admin()
    {
        $list = User::orderBy('id', 'desc')->get();
        return view('dashboard', compact('list'));
    }
}
