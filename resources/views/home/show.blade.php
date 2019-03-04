@extends('home.layout')

@section('content')
    <div class="container mt-2">
        {{--<nav aria-label="breadcrumb">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                {{--<li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                {{--<li class="breadcrumb-item active" aria-current="page">Data</li>--}}
            {{--</ol>--}}
        {{--</nav>--}}
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $article->title }}</h1>
                <h6 class="card-subtitle mb-2 text-muted">
                    <span>{{ $article->created_at }}</span>
                    <span>{{ $article->origin }}</span>
                    <span>{{ $article->writer }}</span>
                </h6>

                <article class="card-text">
                    {!! $article->data->content !!}
                </article>
            </div>
        </div>
    </div>
@endsection