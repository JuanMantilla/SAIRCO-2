<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{

    public function index()
    {
        return view('nicolas');
    }
    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('sairco@app.com', 'SAIRCO');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }

}
