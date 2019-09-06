<tr>
    <td>
        <a href="{{ route('product.show', $row->id) }}"><strong>{{$row->name}}</strong></a>
    </td>
        <td>{{ $row->price }}$</td>
    <td>
        <form action="{{ route('wishlist.delete', $row->id) }}" method="POST">
            @csrf
            <input type="hidden" value="{{$row->rowId}}" name="rowId">
            <button type="submit" class="btn btn-online-danger">Delete</button>
                    </form>
            </td>
</tr>
