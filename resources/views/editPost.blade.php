
<form method='post' action="{{route('post.update', ['post'=>$post])}}">
    @csrf
    @method('PUT')
    
    title: <input name='title' value="{{$post->title}}"/> <br/>
    content: <input name='content' value="{{$post->content}}"/><br/>

    category: <input name='category' value="{{$post->category->id}}"/><br/>

    @for ($i = 0; $i < 3; $i++)
        @if ($post->tags->isNotEmpty() && $post->tags[$i] != null)
            tag:<input name='tag{{$i+1}}' value="$post->tags[{{$i}}]->id }}"/><br/>    
        @else
            tag:<input name='tag{{$i+1}}' value=""/><br/>
        @endif
    @endfor
    
       

    <input type='submit' value='edit'>


</form>