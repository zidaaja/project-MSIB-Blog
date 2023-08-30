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
            'articles' => Article::all(),
            'articel_categories' => $this->articel_categories,
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
        $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            $data['user_id'] = Auth()->user()->id;
            $article = Article::create($data);

            //return succes
        toast('Your article has been created!','success');
        return to_route('admin.article.index');
    }

    public function category(Request $request)
    {

        // $article = Article::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
        ]);

        if ($request->name) {
            foreach ($data['name'] as $item => $value) {
                $data2 = array(
                    // 'project_id' => $project->id,
                    'name' => $data['name'][$item],
                    'slug' => Str::slug($data['name'][$item]),
                );
                ArticelCategory::create($data2);
            };
        };

        // $data['slug'] = Str::slug($request->name);
        // $data['project_id'] = $project->id;

        // $jobdesk = Jobdesk::create($data);

        toast('New Category has been added!', 'success');
        // toast($jobdesk->name.' has been added!','success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);

        toast('Your data has been deleted!', 'success');
        return redirect()->back();
    }
}
