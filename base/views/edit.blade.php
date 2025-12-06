<div>
    <h1>Đây là trang thêm mới</h1>
    @if (!empty($_SESSION['errors']))
        <div>
            <ul>
                @foreach($_SESSION['errors'] as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form 
        action="/admin/products/update/{{$product['id']}}"
        method="POST"
        enctype="multipart/form-data"
    >
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="{{$product['name']}}">
        </div>
        <div>
            <label for="">Price</label>
            <input type="number" name="price" value="{{$product['price']}}">
        </div>
        <div>
            <label for="">Image</label>
            <!-- <input type="text" name="image"> -->
            <input type="file" name="image">
            <img src="{{ file_url('storages/uploads/products/'.$product['image'])}}" alt="">
        </div>
        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                @foreach ($categories as $c)
                    <option
                        @selected($c['id'] == $product['category_id']) 
                        value="{{ $c['id'] }}"
                    > 
                        {{$c['name']}} 
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>