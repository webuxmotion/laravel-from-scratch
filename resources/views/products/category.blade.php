<x-layout>
    <!--prdt-starts-->
    <div class="prdt">
        <div class="container">
            <h2 style="margin-left: 12px; padding-bottom: 20px;">Products from category: {{ $category->title }}</h2>
        </div>
        <div class="container">
            <div class="prdt-top">
                <div class="col-md-9 prdt-left">
                    @include('products.partials.product-list', [
                        'products' => $products,
                        'curr' => $curr,
                        'category' => $category
                    ])
                </div>
                <div class="col-md-3 prdt-right">
                    <x-filter />
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--product-end-->
</x-layout>
