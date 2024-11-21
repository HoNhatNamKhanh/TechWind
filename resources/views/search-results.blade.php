@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>

    @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
