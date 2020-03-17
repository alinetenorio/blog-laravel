
<form method='post' action="{{route('tag.store')}}">
    @csrf
    
    title: <input name='title'/> <br/>
  
    <input type='submit' value='add'>


</form>