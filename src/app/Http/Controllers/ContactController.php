<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{


    public function add(){
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $form = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);


        // 確認画面で再表示用に分割値も保持しておく
        $form['tel1'] = $request->input('tel1');
        $form['tel2'] = $request->input('tel2');
        $form['tel3'] = $request->input('tel3');

        // 電話番号を結合して保存（DB保存用）
        $form['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

    

        $category = Category::find($form['category_id']);
        $form['category'] = $category; // categoryオブジェクトを追加

        session(['contact_form' => $form]);
        return view('confirm', compact('form'));
    }

    public function edit()
    {
        $form = session('contact_form');
        return view('index', compact('form'));
    }

    public function create(Request $request){
        $form = session('contact_form');
        Contact::create($form);
        session()->forget('contact_form');
        return view ('thanks');
    }


}
