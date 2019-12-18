<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        Mail::queue('emails.contact.contact-form', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('akhsarodhe@gmail.com');
            $message->subject($data['subject']);
        });

        return redirect()->back()->with('status', 'Your Email was Sent!');
    }

    public function getBlog(Post $post)
    {
        $category = Category::all();
        $tag = Tag::all();
        return view('pages.blogs.post', compact('post', 'category', 'tag'));
    }

    public function getHome()
    {
        $posts = Post::latest()->paginate(8);

        return view('home', compact('posts'));
    }
}
