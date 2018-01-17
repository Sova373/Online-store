@extends('app')

@section('content')
    <div class="container">
        <div class="well">
            @foreach($products as $product)
                <div class="row black-line-border">
                    <p>Name : <a href="{{ route('show_product', $product->id) }}">{{ $product->name }} </a></p>
                    @foreach($product->sku as $sku)
                        <div class="col-sm-4">
                            <p>Attributes of SKU {{ $sku->sku }} : </p>
                            <ul>
                                <li>Size => {{ $sku->size }}</li>
                                <li>Color => {{ $sku->color }}</li>
                                <li>Price => {{ $sku->price }}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection