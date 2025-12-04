<div>
    <h1>Đây là trang thêm mới</h1>
    <form 
        action="/admin/products/store"
        method="POST"
        enctype="multipart/form-data"
    >
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Price</label>
            <input type="number" name="price">
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                @foreach ($categories as $c)
                    <option value="{{ $c['id'] }}"> {{$c['name']}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>