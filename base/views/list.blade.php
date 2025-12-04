<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $p)
                <tr>
                    <td> {{ $p['id'] }} </td>
                    <td> {{ $p['name'] }} </td>
                    <td> {{ $p['price'] }} </td>
                    <td> 
                        <img src="{{ file_url('storages/uploads/products/'.$p['image']) }}" alt="">    
                    </td>
                    <td> {{ $p['category_id'] }} </td>
                    <td>
                        <a href="/admin/products/detail/{{ $p['id'] }}">Detail</a>
                        <a href="">Edit</a>
                        <a 
                            href="/admin/products/delete/{{ $p['id'] }}"
                            onclick="return confirm('Bạn có chắc không?')"    
                        >
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>