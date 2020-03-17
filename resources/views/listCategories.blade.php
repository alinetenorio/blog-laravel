
@foreach ($categories as $category)
    <form method="post" action="{{ route('category.update', ['category'=>$category]) }}">
        @csrf 
        @method('put')   
        tag: <input name="title" value="{{$category->title}}" /> 
        <input type="submit" value="editar"/>
        <br/>
    </form>

    <form method="post" action="{{ route('category.destroy',['category'=>$category]) }}">
        @csrf
        @method('delete')
        <input type="submit" value="deletar"/>
    </form>
   
@endforeach