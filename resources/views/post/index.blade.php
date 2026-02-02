@extends('layouts.mains')
@section('content')
<div>
    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3" >Add posts </a>
    </div>
    @foreach($posts as $post)
        <div><a href="{{route('post.show',$post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
    @endforeach
    <div>
        {{$posts->links()}}
    </div>

</div>
@endsection


