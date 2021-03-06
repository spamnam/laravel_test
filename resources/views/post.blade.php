@extends('layout.core')

@section('title')Пост@stop

@section('content')
        <div class="row">
            <div class="col">
                <h3>{{$post->title}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="bg-light p-3 mb-3">
                    {{$post->body}}
                </div>
            </div>
        </div>
        @if($post->comments->count())
        <div class="row">
            <div class="col">
                @foreach($post->comments as $comment)
                    <div class="shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="d-flex mb-3 align-items-center justify-content-start">
                            <div class="pe-3">
                                <b>{{$comment->user->name}}</b>
                            </div>
                            <div class="pe-3">
                                {{$comment->created_at}}
                            </div>
                            <div class="flex-grow-1">
                                <div class="btn-group btn-group-sm float-end">
                                    <a href="#" class="btn btn-primary"><i class="bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-primary"><i class="bi-x-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{$comment->text}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                @if($errors->addComment->count())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->addComment->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{$paginator->onEachSide(5)->links('pages')}}

                <form action="{{route('post.single', ['id' => $post->id])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">Текст</label>
                        <textarea type="text" class="form-control" name="text" id="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
@stop
