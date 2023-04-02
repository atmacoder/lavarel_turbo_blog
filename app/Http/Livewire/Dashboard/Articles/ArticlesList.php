<?php

namespace App\Http\Livewire\Dashboard\Articles;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use Livewire\WithPagination;

class ArticlesList extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $categories;
    public $category = 0;

    protected  $articles;

    protected $perPage= 10;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.articles.articles-list',[
            'articles' => $this->articles
        ]);
    }
    public function mount(Request $request){
        if($request->category_id){
            $this->category = $request->category_id;
            $this->articles = Article::Where('category_id',$request->category_id)->paginate($this->perPage);
        }
        else{
            $this->articles = Article::paginate($this->perPage);
        }


        $this->categories = Category::all();
    }
    public function updatingPage($page){
        return redirect()->to('/articles?page=' . $page . '&category_id=' . $this->category);
    }
    public function updatingCategory($category){
        $this->category = $category;
        $this->page = 1;
        $this->articles = Article::where('category_id',$this->category)->paginate($this->perPage);
        return redirect()->to('/articles?page=1' . '&category_id=' . $this->category);
    }
}
