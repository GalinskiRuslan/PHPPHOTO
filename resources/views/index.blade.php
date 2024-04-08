@extends('layout.base')


@section('title', 'MyProject || Main')

@section('content')
    <h1>CodeArt</h1>
    <div class="categories">
        <p>Категории:</p>
        @each('catalog.shared.category', $categories, 'item')
    </div>
    <div class="productsContainer">
        <p class="item-title">Товары:</p>
        <button id="arrowRight">></button>
        <div class="products" id="productContainer">

            @each('catalog.shared.product', $products, 'item')
        </div>
    </div>
    <div class="brandsContainer">
        <p class="item-title">Брэнды:</p>
        <div class="brands" id="brands">
            @each('catalog.shared.brand', $brands, 'item')
        </div>
    </div>
@endSection
@push('js')
    <script>
        const container = document.getElementById('container');
        const productContainer = document.getElementById('productContainer');
        const brandContainer = document.getElementById('brands');
        const mainContainer = container.clientWidth;
        const stepCount = Math.round(productContainer.clientWidth / mainContainer);
        let step = 1;
        let stepBrands = 1;
        const stepHandler = () => {
            if (step >= stepCount) {
                step = 1;
                productContainer.style.left = `0px`

            } else {
                productContainer.style.left = `-${step * mainContainer}px`
                step++;
            }
        }
        const brandStepHandler = () => {
            if (stepBrands >= stepCount) {
                stepBrands = 1;
                brandContainer.style.left = `0px`

            } else {
                brandContainer.style.left = `-${stepBrands * mainContainer}px`
                stepBrands++;
            }
        }
        const arrowRight = document.getElementById("arrowRight");
        arrowRight.addEventListener('click', stepHandler)
        // setTimeout(stepHandler, 5000)
        setInterval(stepHandler, 5000)
        setInterval(brandStepHandler, 6000)
        console.log(container.clientWidth);


    </script>
@endpush
