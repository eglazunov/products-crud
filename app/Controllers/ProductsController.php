<?php

namespace App\Controllers;

use App\System\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Product\ProductRepository;
use Illuminate\Validation\Factory as Validation;
use App\Repositories\Attribute\AttributeRepository;

class ProductsController
{
    /**
     * @var Validation
     */
    private $validation;

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
     * @param Validation $validation
     * @param ProductRepository $productRepository
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(
        Validation $validation,
        ProductRepository $productRepository,
        AttributeRepository $attributeRepository
    )
    {
        $this->validation = $validation;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Returns list of products
     *
     * @return View
     */
    public function index(): View
    {
        $products = $this->productRepository->getAll();

        return new View('products/index', compact('products'));
    }

    /**
     * Returns form for creating product
     *
     * @return View
     */
    public function create(): View
    {
        $attributes = $this->attributeRepository->getAll();

        return new View('products/create', compact('attributes'));
    }

    /**
     * Store product by request
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        if (!$this->validate($request)) {
            return new RedirectResponse("/products/create");
        }

        $product = $this->productRepository->create($request->all());

        return new RedirectResponse("/products/{$product->id}/edit");
    }

    /**
     * Returns form for editing product
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $product = $this->productRepository->getById($id);
        $attributes = $this->attributeRepository->getAll();

        return new View('products/edit', compact('product', 'attributes'));
    }

    /**
     * Update product by given id and request
     *
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(int $id, Request $request): RedirectResponse
    {
        if (!$this->validate($request)) {
            return new RedirectResponse("/products/{$id}/edit");
        }

        $this->productRepository->update($id, $request->all());

        return new RedirectResponse("/products/{$id}/edit");
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->productRepository->delete($id);

        return new JsonResponse([], 200);
    }

    /**
     * Returns true if request is valid
     *
     * @param Request $request
     * @return bool
     */
    private function validate(Request $request): bool
    {
        $validator = $this->validation->make($request->all(), [
            'price' => 'numeric',
            'title' => 'required',
            'attributes' => 'array',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            $_SESSION["errors"] = $validator->errors()->toArray();
        } else {
            $_SESSION["success"] = 'Success saved!';
        }

        return !$validator->fails();
    }
}
