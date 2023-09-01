<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticelCategory;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public $articel_categories;
    public function __construct() {
        $this->articel_categories = ArticelCategory::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'articles' => Article::with('articel_category')->latest()->filter(request())->paginate(5),
            'articel_category' => $this->articel_categories,
        ];
         return view('admin.article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'url' => route('admin.article.store'),
            'articel_categories' => $this->articel_categories,

        ];
        return view('admin.article.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $data = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'content' => 'string|nullable',
            'articel_category_id' => 'required',
            'image' => 'required'
        ]);
            $data['slug'] = Str::slug($request->title);
            $data['user_id'] = Auth()->user()->id;
            $article = Article::create($data);

            if($request->hasFile('image')){
                $article->addMediaFromRequest('image')->toMediaCollection('image');
            }

            //return succes
        toast('Your article has been created!','success');
        return to_route('admin.article.index');
    }








    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        $data = [
            'article' => $article,
        ];

        return view('admin.article.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'article' => Article::findOrFail($id),
            'url' => route('admin.article.update', $id),
            'articel_categories' => $this->articel_categories,

        ];
        return view('admin.article.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'content' => 'string|nullable',
            'articel_category_id' => 'required',
            // 'image' => 'required'
        ]);
            $data['slug'] = Str::slug($request->title);
            $data['user_id'] = Auth()->user()->id;
            $article->update($data);

            if($request->hasFile('image')){
                if($article->hasMedia('image')){
                    $article->getFirstMedia('image')->delete();
                }
                $article->addMediaFromRequest('image')->toMediaCollection('image');
            }

        toast('Your Article has been updated!','success');
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        if($article->hasMedia('image')){
            $article->getFirstMedia('image')->delete();
        }

        $article->delete();

        toast('Your data has been deleted!', 'success');
        return redirect()->back();
    }

    public function publish($id)
    {
        $article = Article::findOrFail($id);
        $article->is_published = !$article->is_published;
        $article->save();

        if ($article->is_published) {
            toast($article->title . ' has been published', 'success');
        } else {
            toast($article->title . ' was unpublished!', 'info');
        }
        return redirect()->back();
    }

    public function category()
    {
        $data = [
            'url' => route('admin.article.category_store'),
            'articel_category' => ArticelCategory::filter(request())->paginate(5),
        ];
        return view('admin.article.category', $data);
    }

    public function category_store(Request $request)
    {


        $data = $request->validate([
            'name' => 'required',
        ]);

        if ($request->name) {
            foreach ($data['name'] as $item => $value) {
                $data2 = array(
                    'name' => $data['name'][$item],
                    'slug' => Str::slug($data['name'][$item]),
                );
                ArticelCategory::create($data2);
            };
        };



        toast('Category has been added!', 'success');
        return back();
    }

    public function category_update(Request $request, String $id)
    {


        $articel_category = ArticelCategory::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['slug'] = Str::slug($request->name);

        $articel_category->update($data);

        toast('Category has been updated!', 'success');

        return redirect()->back();
    }
    public function category_destroy(string $id)
    {
        ArticelCategory::destroy($id);



        toast('Your data has been deleted!', 'success');
        return redirect()->back();
    }
}
