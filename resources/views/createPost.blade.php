
<form method='post' action="{{route('post.store')}}">
    @csrf
    
    title: <input name='title'/> <br/>
    content: <input name='content'/><br/>
    category: <input name='category'/><br/>

    tag:<input name='tag'/><br/>

    <input type='submit' value='add'>


</form>