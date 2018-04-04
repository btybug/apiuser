<?php

namespace BtyBugHook\ApiUser\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhpJsonParser;
use Btybug\User\Repository\UserRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('apiuser::index', compact(''));
    }
    public function getCallback(Request $request,UserRepository $userRepository){
        $userData = json_decode($request->get('userData'),true);

        if(count($userData)){
            $user = $userRepository->findBy('email',$userData['email']);
            $message= 'already have user';
            if(! $user){
                $user = $userRepository->create([
                    'username' => $userData['email'],
                    'email' => $userData['email'],
                    'f_name' => $userData['first_name'],
                    'l_name' => $userData['last_name'],
                ]);
                $message= 'registered new user';

            }

            auth()->login($user);
        }


        return \Response::json(['error' => false,'message' =>$message]);
    }

    public function getSettings()
    {
        $data = json_decode(BBgetApiSettings('FBlogin')->val,true);
        return view('apiuser::fbapi', compact('data'));
    }

    public function postSettings(Request $request)
    {
        BBeditApisettings('FBlogin',$request->except('_token'));
        return redirect()->back()->with('message','Saved');
    }
}