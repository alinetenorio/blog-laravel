
<form method='post' action="{{route('category.store')}}">
    @csrf
    
    title: <input name='title'/> <br/>
  
    <input type='submit' value='add'>


</form>