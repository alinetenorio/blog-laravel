
@foreach ($posts as $post)
    title: {{$post->title}} <br/>
    content: {{$post->content}} <br/>
    author: {{$post->user()->name}} <br/>
    category: {{$post->category()->title}} <br/>
    
    @foreach ($posts->tags() as $tag)
        tag: {{$tag->title}} <br/>
    @endforeach
    
    @foreach ($posts->comments() as $comment)
        author: {{$comment->author}} <br/>
        comment: {{$comment->content}} <br/>        
    @endforeach

@endforeach