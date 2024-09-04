<?php

namespace App\Http\Controllers\Post;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\Post\PostRepository;
use App\Repositories\User\UserRepository;

class PostController extends Controller
{
    //
    protected $postRepository;

    protected $userRepository;

    public function __construct(PostRepository $postRepository,
                                UserRepository $userRepository
                                )
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();

        return view('posts.index')->with([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = $this->userRepository->getAll();

        return view('posts.create',['users' => $users]);
    }

    public function store(CreatePostRequest $request)
    {
        
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $this->postRepository->create($data);
            DB::commit();

            return redirect()->route('posts.index')->with('success' , __('common.success'));
        }
        catch(\Exception $e) {
            DB::rollBack();
            Log::error('Error creating post: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function show(Request $request)
    {
        try {
            $post = $this->postRepository->getById($request->id);
            $user = $post->user;
            $users = User::all();

            return view('posts.edit')->with([
                'post' => $post,
                'user' => $user,
                'users' => $users
            ]);
        } catch(\Exception $e) {
            return redirect()->back();
        }
    }

    public function update(UpdatePostRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $this->postRepository->update($data);
            DB::commit();

            return redirect()->route('posts.index')->with('success', __('common.success'));
        } catch(\Exception $e) {
            DB::rollBack();
            Log::error('Error updating post: ' . $e->getMessage());
            return redirect()->back()->with('error' ,__('error'));
        }
    }

    public function destroy(Request $request)
    {
        try { 
            DB::beginTransaction();
            $this->postRepository->delete($request->id);
            DB::commit();

            return redirect()->route('posts.index')->with(['success' => __('commonn.delete_success')]);
        } catch(\Exception $e){
            DB::rollBack();
            $this->logError($e);
            return $this->errorBack(__('common.messages.error'));
        }
    }
}
