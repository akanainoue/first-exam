<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Contact;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function enter(LoginRequest $request){
        $login = $request->only(['email', 'password']);


    }

    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories= Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->created_at)->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }


    public function logout(){
        return view('auth.login');
    }

}
