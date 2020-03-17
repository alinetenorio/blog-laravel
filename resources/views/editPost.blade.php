
<form method='post' action="{{route('post.update', ['post'=>$post])}}">
    @csrf
    @method('PUT')
    
    title: <input name='title' value="{{$post->title}}"/> <br/>
    content: <input name='content' value="{{$post->content}}"/><br/>

    category: <input name='category' value="{{$post->category->id}}"/><br/>

    @foreach ($post->tags as $tag)
        tag:<input name='tag' value="{{$tag->id}}"/><br/>
    @endforeach

    <input type='submit' value='edit'>


</form>