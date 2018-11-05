<?php


class Posts extends Controller
{
    /**
     * @var Post
     */
    public $postModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        //Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sanitize POST array
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            //Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Title must not be empty!';
            }

            //Validate body
            if (empty($data['body'])) {
                $data['body_err'] = 'Body must not be empty!';
            }

            //Make sure there is no errors
            if (empty($data['body_err']) && empty($data['title_err'])) {
                //Validated
                if ($this->postModel->addPost($data)){
                    flash('post_message','Your post was added successful!');
                    redirect('posts');
                }else{
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => ''
            ];
        }

        $this->view('posts/add', $data);
    }

    public function show($postId){
        $post=$this->postModel->getPostById($postId);
        $data=[
            'post'=>$post
        ];
        $this->view('posts/show',$data);
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sanitize POST array
            $data = [
                'id'=>$id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            //Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Title must not be empty!';
            }

            //Validate body
            if (empty($data['body'])) {
                $data['body_err'] = 'Body must not be empty!';
            }

            //Make sure there is no errors
            if (empty($data['body_err']) && empty($data['title_err'])) {
                //Validated
                if ($this->postModel->updatePost($data)){
                    flash('post_message','Your post was edited successful!');
                    redirect('posts');
                }else{
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/edit', $data);
            }
        } else {
            //Get post by id
            $post=$this->postModel->getPostById($id);
            //Check for owner
            if ($post->user_id!== $_SESSION['user_id']){
                redirect('posts');
            }

            $data = [
                'id'=>$id,
                'title' => $post->postTitle,
                'body' => $post->postBody
            ];
        }

        $this->view('posts/edit', $data);
    }

    public function delete($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post=$this->postModel->getPostById($id);
            //Check for owner
            if ($post->user_id!== $_SESSION['user_id']){
                redirect('posts');
            }
            if($this->postModel->deletePost($id)){
                flash('post_message','Your post was deleted successful!');
                redirect('posts');
            }
        }else{
            redirect('posts');
        }
    }
}

