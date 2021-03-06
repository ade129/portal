<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Quotes;
use App\Models\Tags;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class QuotesController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

   public function index()
   {
      $contents = [
        'quotes'  => Quotes::with(['tags','image'])->get(),
      ];

      $pagecontent = view('users.quotes.index',$contents);

      $pagemain = array (
        'title' => 'Quotes',
        'menu' => 'Master',
        'submenu' => 'quotes',
        'pagecontent' => $pagecontent,
      );

      return view('masterpage', $pagemain);
   }

   public function create_page()
   {    
       $tags = Tags::all();

       $contents = [
           'quotes' => Quotes::all(),
           'tags' => $tags,
       ];
       $pagecontent = view('users.quotes.create',$contents);
       
       $pagemain = array(
           'title' => 'Quotes',
           'menu' => 'quotes',
           'submenu' => 'quotes',
           'pagecontent' => $pagecontent,
       );

       return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'tittle' => 'required',
            // 'slug' => 'required',
            'subject' => 'required',
        ]);
        $active = FALSE;
        if($request->has('active')){
            $active = TRUE;
        }

        $saveQuotes = new Quotes;
        $saveQuotes->tittle = $request->tittle;
        $saveQuotes->slug = $slug = Str::slug($request->tittle, '-');
        $saveQuotes->subject = $request->subject;
        $saveQuotes->active = $active;
        $saveQuotes->save();
        
        //save images
        $save_images = new Images;
        $save_images->idquotes = $saveQuotes->idquotes;
        if ($request->hasFile('images')){
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/quotes_images/' . $re_image) );
            $save_images->name = $re_image;
        }
        $save_images->save();
      
        //save tags
        $saveQuotes->tags()->attach($request->tags,[
                   'created_at' => date('Y-m-d h:i:s')
                    ]);

        return redirect('quotes')->with('Status_Success','Quotes Created');
    
    }
    public function update_page(Quotes $quotes)
    {
        // return $request->all();
        $tags = Tags::all();
        $quotes = Quotes::with(['tags'])
                ->where('idquotes',$quotes->idquotes)
                ->first();

        $data_tags = [];
        foreach($quotes->tags as $tag){
            $data_tags[] = $tag->idtags;
        }

        $contents = [
            'data_tags' => $data_tags,
            'tags' => $tags,
            'quotes' => $quotes,
        ];

       $pagecontent = view('users.quotes.update',$contents);

       $pagemain = array (
           'title' => 'Quotes',     
           'menu' => 'Quotes',
           'submenu' => 'quotes',
           'pagecontent' => $pagecontent,
       );

       return view('masterpage', $pagemain);

    }
    public function update_save(Request $request, Quotes $quotes)
    {
    //    return $request->all();     
       $request->validate([
        'tittle' => 'required',
        // 'slug' => 'required',
        'subject' => 'required',
        'active' => ''
        ]);
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }
        $updateQuotes = Quotes::find($quotes->idquotes);
        $updateQuotes->tittle = $request->tittle;
        $updateQuotes->slug = $slug = Str::slug($request->tittle, '-');
        $updateQuotes->subject = $request->subject;
        $updateQuotes->active = $active;            
        $updateQuotes->save();
        
        $updateQuotes->tags()->sync($request->tags);

          return redirect('quotes')->with('status_success','Update Quote');
    }

    public function delete(Quotes $quote)
    {

        $deleteQuotes = Quotes::with(['tags'])
                        ->where('idquotes',$quote->idquotes)
                        ->first();
        // return $deleteQuotes; 
        $data_tag = [];                
        foreach($deleteQuotes->tags as $tag){
            $data_tag[] = $tag->idtags;
        }

        $deleteQuotes->tags()->detach($data_tag);
        $deleteQuotes->delete();
        return redirect('quotes')->with('status_success','Deleted Quotes');
    }

    public function show($slug)
    {
        // die('oke');
        $slud = Quotes::where('tittle',$slug)->first();
        return $slud;
    }
}
