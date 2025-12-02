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
                        <img src="{{ $p['image'] }}" alt="">    
                    </td>
                    <td> {{ $p['category_id'] }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>