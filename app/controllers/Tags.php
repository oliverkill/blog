<?php


class Tags extends Controller
{

    /**
     * Tags constructor.
     */
    public function __construct()
    {
        $this->tagModel = $this->model('Tag');
    }

    public function index(){
        $tags = $this->tagModel->getTags();
        $data = array(
            'tags' => $tags
        );
        $this->view('tags/index', $data);
    }

    public function show($tagName) {
        $posts = $this->tagModel->getPostsByTags($tagName);
        $data = array(
            'tagName' => $tagName,
            'posts' => $posts
        );
        $this->view('tags/show', $data);
    }
}
