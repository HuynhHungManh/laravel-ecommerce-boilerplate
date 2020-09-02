<?php

namespace Arabia\Product\Http\Controllers;

use Arabia\Product\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Arabia\Product\Repositories\ProductRepository;
use Arabia\Attribute\Repositories\AttributeFamilyRepository;
use Arabia\Attribute\Repositories\AttributeValueRepository;

class ProductController extends Controller
{
    protected $productRepository;

    protected $attributeFamilyRepository;

    protected $attributeValueRepository;

    public function __construct(
        ProductRepository $productRepository,
        AttributeFamilyRepository $attributeFamilyRepository,
        AttributeValueRepository $attributeValueRepository
    )
    {
        $this->productRepository = $productRepository;

        $this->attributeFamilyRepository = $attributeFamilyRepository;

        $this->attributeValueRepository = $attributeValueRepository;
    }

    public function store()
    {
        $data = request()->only([
            'brand_id',
            'sku',
            'name',
            'slug',
            'description',
            'quantity',
            'weight',
            'price',
            'sale_price',
            'status',
            'featured',
            'attribute_family_id',
            'attributes',
        ]);

        $product = $this->productRepository->create($data);

        $attributes = $this->attributeFamilyRepository->find($data['attribute_family_id'])->attributes()->get()->toArray();

        foreach ($attributes as $key => $attribute) {
            if (!empty($data['attributes'][0][$attribute['code']])) {
                $this->attributeValueRepository->create([
                    'attribute_id' => $attribute['id'],
                    'product_id' => $product->id,
                    'name' => $attribute['code'],
                    'value' => $data['attributes'][0][$attribute['code']],
                ]);
            }
        }

        $product->attributes = $this->productRepository->getProductAttributes($product->id);

        return $this->reply()->content($product);
    }

    public function get($id)
    {
        $product = $this->productRepository->find($id);

        $product->attributes = $this->productRepository->getProductAttributes($product->id);

        return $this->reply()->content($product);
    }
}
