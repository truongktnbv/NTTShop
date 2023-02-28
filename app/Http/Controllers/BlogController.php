<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Blog\BlogService;
class BlogController extends Controller
{
    protected $product;
    protected  $blog;
    public function __construct(ProductService $product,BlogService $blog)
    {
        $this->product = $product;
        $this->blog = $blog;
    }
    public function index()
    {
        return view('blogs.blog',[
            'title'=>'NTTShop',
            'blogs'=> $this->blog->show(),
            'products' => $this->product->get()
        ]);
    }
}
