<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Package;
use App\Category;
use App\Article;
use App\Portfolio;

class DataController extends Controller
{
    // about
    public function get_about(){
        $about = About::all();
        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $about,
        ], 200);
    }

    // all category
    public function get_categories(){
        $categories = Category::all();
        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $categories,
        ], 200);
    }

    // category by id
    public function get_category_by_id($id){
        $category = Category::find($id);
        if($category){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $category,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'Data'      => [],
            ], 404);
        }
    }

    // all article
    public function get_all_articles(Request $request) {
        $keyword  = $request->get('s') ? $request->get('s') : '';
        $category = $request->get('c') ? $request->get('c') : '';

        $articles = \App\Article::with('categories')
                                    ->whereHas('categories', function($q) use($category){
                                        $q->where('name', 'LIKE', "%$category%");
                                    })
                                    ->where('status', 'PUBLISH')
                                    ->where('title', 'LIKE', "%$keyword%")
                                    ->paginate(10);

        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $articles,
        ], 200);
    }

    // article by id
    public function get_article_by_id($id){
        $article = Article::find($id);
        if($article){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $article,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'data'      => [],
            ], 200);
        }
    }

    // article by category name
    public function get_article_by_category_name($category){
        $articles = \App\Article::with('categories')
                                    ->whereHas('categories', function($q) use($category){
                                        $q->where('name', 'LIKE', "%$category%"); })
                                    ->paginate(10);
        if($articles){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $articles,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'data'      => [],
            ], 200);
        }
    }
        

    // all portfolio
    public function get_portfolios(){
        $portfolios = Portfolio::all();
        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $portfolios,
        ], 200);
    }

    // portfolio by id
    public function get_portfolio_by_id($id){
        $portfolio = Portfolio::find($id);
        if($portfolio){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $portfolio,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'Data'      => [],
            ], 404);
        }
    }
    // all Package
    public function get_packages(){
        $packages = Package::all();
        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $packages,
        ], 200);
    }

    // Package by id
    public function get_package_by_id($id){
        $package = Package::find($id);
        if($package){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $package,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'Data'      => [],
            ], 404);
        }
    }

}
