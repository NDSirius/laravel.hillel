@extends('layouts.app')

@section('content')

    @foreach ($products as $product)

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="storage/images/products/{{$product->thumbnail }}" height="250" width="350">

                            <div class="card-body">
                                    <a href="product/showProduct/{{$product->id}}">{{$product->title}}</a>
                                    <a>{{$product->short_description}}</a>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                    </div>
                                      <small class="text-muted">{{$product->price}}$</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </main>

        <footer class="text-muted">

        </footer>

    @endforeach
    {{$products->links()}}
@endsection








