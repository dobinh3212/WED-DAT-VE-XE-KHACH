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
        $news = News::where('check_slide',1)->paginate(15);
        return view('admin.tintuc.index')->with('news', $news);
    }
    public function create()
    {
        return view('admin.tintuc.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $input = $request->all();
        $file_name_time = null;
        if ($request->hasFile('image')) {
            $file_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $name_slug = Str::slug($file_name, '_');
            $file_name_time = $name_slug . '_' . time() . '.' . $extension;
            $path = public_path('/upload/new/');
            $request->file('image')->move($path, $file_name_time);
        }

        $input['image'] = $file_name_time;
        $news = $this->newsRepository->create($input);
        Flash::success('Thêm tin tức thành công.');
        return redirect(route('news.index'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);
        if (empty($news)) {
            Flash::error('Tin tức trống trống');
            return redirect(route('news.index'));
        }
        return view('admin.tintuc.edit')->with('news', $news);
    }

    public function update($id, UpdateNewsRequest $request)
    {
        $news = $this->newsRepository->find($id);
        $input = $request->all();
        if (empty($news)) {
            Flash::error('Tin tức trống');

            return redirect(route('news.index'));
        }

        $news = $this->newsRepository->update($input, $id);

        Flash::success('Cập nhật tin tức thành công.');

        return redirect(route('news.index'));
    }

    public function destroy($id)
    {  
        $news = $this->newsRepository->find($id);
        if (empty($news)) {
            Flash::error('Tin tức trống');
            return redirect(route('news.index'));
        }
        $news->update(['check_slide' => 0]);
        Flash::success('Xóa tin tức thành công.');
        return redirect(route('news.index'));
    }
}
