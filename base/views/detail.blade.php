<div>
    <h1>ID: {{ $product['id'] }}</h1>
    <h4>Name: {{ $product['name'] }}</h4>
    <h4>Price: {{ $product['price'] }}</h4>
    <h4>Category: {{ $product['category_id'] }}</h4>
    <h4>Image: 
        <img src="{{ $product['image'] }}" alt="">
    </h4>
</div>