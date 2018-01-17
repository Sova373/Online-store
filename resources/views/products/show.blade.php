@extends('app')

@section('content')
    <div class="container">
        <div class="well">
            <p>Name : {{ $product->name }} </p>
            <div class="row">
                @foreach($product->sku->pluck('size')->unique() as $sku)
                    <button type="button" class="btn btn-sm btn-default size_btn">{{ $sku }}</button>
                @endforeach
            </div>
            <div class="row">
                @foreach($product->sku->pluck('color')->unique() as $sku)
                    <button type="button" class="btn btn-sm btn-default color_btn">{{ $sku }}</button>
                @endforeach
            </div>
            <div class="row" id="sku_data">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.size_btn,.color_btn').on('click', function () {
            if ($(this).hasClass('size_btn'))
                $('.size_btn').removeClass('active');
            if ($(this).hasClass('color_btn'))
                $('.color_btn').removeClass('active');
            $(this).addClass('active');
            var size_active = $('.size_btn.active').text();
            var color_active = $('.color_btn.active').text();

            if(color_active && size_active)
                $.ajax({
                    type: "POST",
                    url:  "/products/get_sku",
                    data: {
                        size : size_active,
                        color : color_active,
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(sku){
                        $('#sku_data').empty();
                        $('#sku_data').append(
                            '<p> Price : ' + sku.price + '</p>' +
                            '<p> SKU : ' + sku.sku + '</p>'
                        );
                    },
                    error: function (msg) {
                        console.log('oops' + msg);
                    }
                });
        })
    </script>
@endsection