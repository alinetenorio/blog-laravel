
<form method='post' action="{{route('post.store')}}">
    @csrf
    
    title: <input name='title'/> <br/>
    content: <input name='content'/><br/>

    category: <input name='category'/><br/>

    tag:<input name='tag1'/><br/>
    tag2:<input name='tag2'/><br/>
    tag3:<input name='tag3'/><br/>

    <input type='submit' value='add'>


</form>