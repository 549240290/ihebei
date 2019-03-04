@extends('home.layout')
@section('content')

    @foreach($top as $item)
        @if( $loop->first )
            <div class="jumbotron">
                <div class="container">
                    <h2>{{ $item->title }}</h2>
                    <hr class="my-4">
                    <p class="lead">{{ $item->description }}</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{ url("/show/$item->id") }}" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        @endif
    @endforeach


    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @foreach($top as $item)
                @if(!$loop->first)
            <div class="col-md-4">
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <p><a class="btn btn-secondary" href="{{ url("/show/$item->id") }}" role="button">Learn more</a></p>
            </div>
                @endif
            @endforeach
        </div>
        <hr>

        <div class="row">
            <div class="col-4 order-2">
                <div class="card">
                    <div class="card-header">
                        滚动阅读
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($newest as $item)
                            <li class="list-group-item">
                                <a href="{{ url("/show/$item->id") }}">{{ $item->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-8 order-1">
                <div class="card">
                    <div class="card-header">
                        推荐阅读
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($recommend as $item)
                                @if($loop->index%2 == 0)
                                    <li class="media">
                                @else
                                    <li class="media my-4">
                                @endif
                                    <img src="{{ $item->thumbnail }}" class="mr-3" alt="{{ $item->title }}">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1">{{ $item->title }} {{ $loop->index }}</h5>
                                        {{ $item->description }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection