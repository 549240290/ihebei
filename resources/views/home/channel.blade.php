@extends('home.layout')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-4 order-2">
                <div class="card">
                    <div class="card-header">
                        滚动阅读
                    </div>
                    <ul class="list-group list-group-flush">

                    </ul>
                </div>
            </div>
            <div class="col-8 order-1">
                <div class="card">
                    <div class="card-header">
                        {{ $channel->title }}
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($lists as $item)
                                @if($loop->index%2 == 0)
                                    <li class="media">
                                @else
                                    <li class="media my-4">
                                @endif

                                <img src="{{ $item->thumbnail }}" class="mr-3" alt="{{ $item->title }}">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><a href="{{ url("/show/$item->id") }}">{{ $item->title }} </a></h5>
                                    {{ $item->description }}
                                </div>
                                 </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    {{ $lists->links() }}
                </nav>
            </div>
        </div>
    </div>\
@endsection