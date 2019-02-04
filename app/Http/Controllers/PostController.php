<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
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
        //$posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        $post = new Post;
        $post -> title = $request -> title;
        $post -> slug = $request -> slug;
        $post -> category_id =$request -> category_id;
        $post -> body = $request -> body;
        $post->save();

        Session::flash('success', 'Post created successfuly');
        return redirect()->route('posts.show' , $post->id);
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

        return view('posts.show')->with('post', $post);
        //return view('posts.show');
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
        $categories = Category::all();
        $cats=[];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }



        return view('posts.edit')->with('post',$post)->with('categories', $cats);
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

        $post = Post::find($id);
                // Validate the data
                    // unikalne w:posts table kolumna slug
                    if($request->input('slug') == $post->slug){
                $this->validate($request, array(
                    'title' => 'required|max:255',
                    'category_id' => 'required|integer',
                    'body'  => 'required'
                ));
            }else{
                $this->validate($request, array(
                    'title' => 'required|max:255',
                    'slug' => 'required|unique:posts,slug',
                    'category_id' => 'required|integer',
                    'body'  => 'required'
                ));
            }



            // Save the data to the database
            
    
            $post->title = $request->input('title');
            $post->slug = $request->input('slug');
            $post->category_id = $request-> input('category_id');
            $post->body = $request->input('body');
    
            $post->save();
    
            // set flash data with success message
            Session::flash('success', 'This post was successfully saved.');
    
            // redirect with flash data to posts.show
            return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
