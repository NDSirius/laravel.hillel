<tr>
    <td>
        <a href="{{ route('product.show', $row->id) }}"><strong>{{$row->name}}</strong></a>
        <p>{{($row->options->has('size') ? $row->options->size : '')}}</p>
    </td>
    <td><form action="{{ route('cart.count.update', $row->id) }}" method="POST">
            @csrf
            <input type="hidden" value="{{$row->rowId}}" name="rowId">
            <input type="number" min="1" value="{{ $row->qty }}" name="product_count">
            <input type="submit" value="Update count">
            <div class="cart-table-row-right align-self-center">
                <div class="cart-table-actions">
                    <form action="{{ route('cart.remove', $row->rowId) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark cart-options">Remove</button>
                    </form>
                </div>
                </div>
        </form>
            </td>
    <td>{{$row->price}}</td>
    <td>{{$row->total}}</td>
</tr>
