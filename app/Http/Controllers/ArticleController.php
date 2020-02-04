<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\APIHelpers;
use DB;

class ArticleController extends Controller
{

    /**
     * Create a new controller instance.
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        if (Str::startsWith(request()->path(), 'api')) {
            $response = APIHelpers::createAPIResponse(false, 200, '', $articles);
            return response()->json($response, 200);
        } else {
            return view('articles.index', compact('articles'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $article_save = Article::create($request->all());

        if (Str::startsWith(request()->path(), 'api')) {
            if ($article_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Article added successfully', null);
                return response()->json($response, 201);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'Article creation failed', null);
                return response()->json($response, 400);
            }
        } else {
            return redirect()->route('articles.index')
                ->with('success', 'article created successfully.');
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if (Str::startsWith(request()->path(), 'api')) {
            $response = APIHelpers::createAPIResponse(false, 200, '', $article);
            return response()->json($response, 200);
        } else {
            return view('articles.show', compact('article'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        //$product = Product::find($id);

        $article_update = $article->update($request->all());

        if (Str::startsWith(request()->path(), 'api')) {
            if ($article_update) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Article updated successfully', null);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'Article update failed', null);
                return response()->json($response, 400);
            }
        } else {
            return redirect()->route('articles.index')
                ->with('success', 'article updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article_delete =  Article::find($id) ? Article::find($id)->delete() : '';

        if (Str::startsWith(request()->path(), 'api')) {
            if ($article_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Article deleted successfully', null);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'Article delete failed', null);
                return response()->json($response, 400);
            }
        } else {
            return redirect()->route('articles.index')
                ->with('success', 'article deleted successfully');
        }
    }


    public function search(Request $request)
    {
        $request_data = $request->all();

        var_dump('parameter',$request_data);

        //var_dump('argument',$sdata);



        // $drivers = Article::where('name', 'like', "%{$data}%"))
        //                  ->orWhere('detail', 'like', "%{$data}%"))
        //                  ->get();

        // return Response::json([
        //     'data' => $drivers
        // ]);

    }
}
