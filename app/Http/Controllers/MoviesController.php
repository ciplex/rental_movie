<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movies;
use App\Http\Requests\MoviesRequest;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\ImageManager;

class MoviesController extends Controller
{
   
         private $movies;
    
        private $filesystem;
    
        private $imageManager;
    
        public function __construct(movies $movie, Filesystem $filesystem, ImageManager $imageManager)
        {
            $this->movie = $movie;
            $this->filesystem = $filesystem;
            $this->imageManager = $imageManager;
        }
       
public function index()
{
$movies = $this->movie->with('categories')->orderBy('id', 'DESC')->paginate(10);

return view('movies.index', compact('movies'));
}

public function create()
{
    return view('movies.create');
}

    public function store(MoviesRequest $request)
    {
        $movie = $request->except("poster");
        // cek jika upload photo
        if($request->hasFile('poster'))
        {
         $movie['poster'] = $this->generatePhoto($request->file('poster'), $request->except('poster'));
        }
         $this->movie->create($movie);

         session()->flash('success_message', 'Data tersimpan');
         return redirect('/admin');    
    }

    public function search(Request $request)
    {
       $keyword = $request->input('keyword');
       
       $movie = $this->movie->where('category_id', 'LIKE', "%$keyword%")
            ->orderBy('id', 'DESC')->paginate();
            $movie->appends(['keyword' => $keyword]);

            return view('movies.search', compact('movies'));
    }

    public function edit($id)
    {
       $movie = $this->movie->find($id);

        return view('movies.edit', compact('admin'));
    }

  

    public function update($id, MoviesRequest $request)
    {
        $movieForm = $request->except('poster');
        
        if($request->hasFile('poster'))
        {
         $movieForm['poster'] = $this->generatePhoto($request->file('poster'), $movieForm);
        }

        $movie = $this->movie->find($id);

        if($movie){
            $movie->update($movieForm);
        }

        session()->flash('success_message', 'Data terupdate');
        return redirect('/movies');
                // ->('success_message', 'Data terupdate');
    }

    public function destroy($id)
    {
        $movie = $this->movie->find($id);

        if($movie) 
        {
            $movie->delete();
        }
        return redirect()->back();
            
    }

    public function detail($id) {
        $movie = $this->movie->find($id);
        return view('movies.detail', compact('movies'));
        
    }

    private function generatePhoto($poster, $data)
    {
        $filename = date('YmdHis').'-'.snake_case($data['title']).".".$this->filesystem->extension($poster->getCLientOriginalName());
        $path = public_path("photos/").$filename;
        
        $this->imageManager->make($poster->getRealPath())->save($path);
        return "/photos/".$filename;
    }

}