@extends('layout.e-commerce')

@section('title', 'Product by category')

@section('content')
    

    <div class="accordion" id="accordionExample">
        @foreach ($categories as $index => $c)
        <div class="card">
            <div class="card-header" id="heading{{ $index }}">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                        {{ $c->name }}
                    </button>
                </h2>
            </div>
            <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#accordionExample">
                <div class="card-body">
                    <ul>
                        @foreach ($c->products as $p)
                            <div class="accordion-body">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $p->name }}</h5>
                                      <h6 class="card-subtitle mb-2 text-muted">{{$p->sale_price}}</h6>
                                      <p class="card-text">{{$p->category->name}}</p>
                                    </div>
                            </div>
                        @endforeach
                        </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    

      

@endsection