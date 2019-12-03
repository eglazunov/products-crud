<?php

namespace App\Controllers;

use App\System\View;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductsController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductsController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Returns list of products
     *
     * @return View
     */
    public function index()
    {
        $products = $this->productRepository->getAll();

        return new View('products/index', compact('products'));
    }

    /**
     * Returns form for creating product
     *
     * @return View
     */
    public function create()
    {
        return new View('products/create');
    }

    public function store(Request $request)
    {
        // TODO
    }

    public function edit(int $id)
    {
        // TODO
    }

    public function update(int $id, Request $request)
    {
        // TODO
    }

    public function destroy(int $id)
    {
        // TODO
    }

}
