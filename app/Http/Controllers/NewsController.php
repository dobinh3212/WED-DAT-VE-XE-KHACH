<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Flash;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->middleware('auth');
        $this->newsRepository = $newsRepo;
    }

    public function index()
    {
        $news = News::paginate(15);
        return view('admin.tintuc.index')->with('news', $news);
    }
}
