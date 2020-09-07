<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication; 


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publications = Publication::all(); // retrive all the post in the database
 
                            // passe all the posts to the view
        return view('home', compact('publications'));
    }

    public function createPublication(Request $request) // create a new post
    {
        $data = $request->validate([ // validation rules 
            'title' => 'required', // title cannot be empty
            'body' => 'required'   // same thing for the body the body
        ]); //i will leave a link to the validation documentation
 
        $user = auth()->user(); // return the authenticated user in the session
        $user->publications->create($data); // creates a post for this user with the data 
 
        $request->session()->flash('success', 'Publication created successfully'); // creates a flash message  
                                                                          // to inform the user that the post has been created
                                                                          
        return redirect()->back(); // redirect the user to the previous link                              
    }

    public function editPublication(Publication $publication)
    {
        return view('publication.edit', compact('publication'));
    }

    public function updatePublication(Request $request,Publication $publication) 
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $publication->update($data);
        $request->session()->flash('success', 'publication updated successfully');
        return redirect(route('home'));
    }

    public function deletePublication(Publication $publication) 
    {
        $publication->delete();
        Request()->session()->flash('danger', 'publication deleted');
        return redirect()->back();
    }




}
