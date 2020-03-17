title: {{$post->title}} <br/>
content: {{$post->content}} <br/>
author: {{$post->user->name}} <br/>
category: {{$post->category->title}} <br/>

@foreach ($post->tags as $tag)
    tag: {{$tag->title}} <br/>
@endforeach

<br/><br/>

@foreach ($post->comments as $comment)
    <form method="post" action="{{ route('comment.update', ['comment'=>$comment]) }}">
        @csrf
        @method('put')

        author: {{$comment->author}} <br/>
        comment: <input name="content" value="{{$comment->content}}"/> 
        <input type="hidden" name="post_id" value="{{$post->id}}"/>
        <input type="submit" value="editar"/>
    </form>
    
    <form method="post" action="{{ route('comment.destroy', ['comment'=>$comment]) }}">
        @csrf
        @method('delete')

        <input type="submit" value="deletar"><br/>   
    </form>

@endforeach

<form action="{{route('post.destroy', ['post'=>$post])}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="remover">
</form>

<form method='post' action="{{route('comment.store')}}">
    @csrf
    
    author: <input name='author'/> <br/>
    content: <input name='content'/><br/>

    <input type="hidden" value="{{$post->id}}" name="post_id"/>

    <input type='submit' value='add comment'>


</form>