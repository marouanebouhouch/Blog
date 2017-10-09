<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Monolog\Logger;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $itemsPerPage = 15;
        $posts = Post::where('user_id',Auth::user()->id)->paginate($itemsPerPage);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        $categoriesArray = array();
        foreach ($allCategories as $c)
        {
            $categoriesArray[$c->id] = $c->name;
        }
        return view('posts.create')->with('categories',$categoriesArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),array(
            'title' => 'required|regex:/^[A-Za-z_]+$/',
            'body' => 'required'
        ));
        if ($validator->fails()) {
            redirect('posts.create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $user = Auth::user();
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = $user->id;
            $post->save();
            $post->categories()->attach($request->categories);

            session()->flash('success','The post was successfully saved!');

            return redirect()->route('posts.show',$post->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cats = Category::all();
        $categories = array();
        foreach ($cats as $category)
        {
            $categories[$category->id] = $category->name;
        }
        return view('posts.edit')->with('post',$post)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            'title' => 'required',
            'body' => 'required'
        ));

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->categories()->detach();
        $post->categories()->attach($request->categories);
        $post->save();

        session()->flash('success','The post was successfully updated!');
        return redirect()->route('posts.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        session()->flash('success','The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
