<?php

namespace App\Http\Controllers;

use App\Article;
use \Tochka\JsonRpc\Traits\JsonRpcController;

class ApiController
{
    use JsonRpcController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get Articles.
     *
     * @return \App\Article
     * @throws \Tochka\JsonRpc\Exceptions\RPC\InvalidParametersException
     */
    public function getArticles() {
        $page_uid = $this->validateAndFilter([
            'page_uid' => 'required'
        ]);

        return Article::select('fields')->where('page_uid', $page_uid)->orderByDesc('id')->get();
    }


    /**
     * Create a new Article.
     *
     * @return \App\Article
     * @throws \Tochka\JsonRpc\Exceptions\RPC\InvalidParametersException
     */
    public function addArticle()
    {
        $data = $this->validateAndFilter([
            'page_uid' => 'required',
            'fields' => 'required'
        ]);

        return Article::create([
            'page_uid' => $data['page_uid'],
            'fields' => $data['fields']
        ]);
    }
}
