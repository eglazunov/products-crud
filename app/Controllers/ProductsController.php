<?php

namespace App\Controllers;

use App\System\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Attribute\AttributeRepository;

class ProductsController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var AttributeRepository
     */
    private $attributeRepository;

    /**
     * ProductsController constructor.
     * @param ProductRepository $productRepository
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(ProductRepository $productRepository, AttributeRepository $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
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
        $attributes = $this->attributeRepository->getAll();

        return new View('products/create', compact('attributes'));
    }

    /**
     * Store product
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->productRepository->create($request->all());

        return new RedirectResponse("/products");
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
