<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
       $contents = [
         'tags'  => Tags::all(),
       ];
 
       $pagecontent = view('users.tags.index',$contents);
 
       $pagemain = array (
         'title' => 'Tags',
         'menu' => 'Master',
         'submenu' => 'tags',
         'pagecontent' => $pagecontent,
       );
 
       return view('masterpage', $pagemain);
    }

    
   public function create_page()
   {    
    $tags = Tags::where('active',1)->get();

       $contents = [
           'tags' => Tags::all(),
       ];
       $pagecontent = view('users.tags.create',$contents);
       
       $pagemain = array(
           'title' => 'Tags',
           'menu' => 'tags',
           'submenu' => 'tags',
           'pagecontent' => $pagecontent,
       );

       return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'tag_name' => 'required',
            'slug' => 'required',
        ]);
        $active = FALSE;
        if($request->has('active')){
            $active = TRUE;
        }

        $saveTags = new Tags;
        $saveTags->tag_name = $request->tag_name;
        $saveTags->slug = $request->slug;
        $saveTags->active = $active;
        $saveTags->save();
        return redirect('tags')->with('Status_Success','Tags Created');
    
    }

    public function update_page(Tags $tags)
    {
        // return $tags->all();
        $contents = [
            'tags' => Tags::find($tags->idtags),
        ];

       $pagecontent = view('users.tags.update',$contents);

       $pagemain = array (
           'title' => 'Tags',    
           'menu' => 'Tags',
           'submenu' => 'tags',
           'pagecontent' => $pagecontent,
       );

       return view('masterpage', $pagemain);

    }

    public function update_save(Request $request, Tags $tags)
    {
        // return $request->all();
        $request->validate([
            'tag_name' => 'required',
            'slug' => 'required',
            'status' => ''
        ]);
        $active = FALSE;
        if($request->has('active')){
            $active = TRUE;
        }

        $updateTags = Tags::find($tags->idtags);
        $updateTags->tag_name = $request->tag_name;
        $updateTags->slug = $request->slug;
        $updateTags->active = $active;
        $updateTags->save();
        return redirect('tags')->with('Status_Success','Tags Created');
    
    }

} 