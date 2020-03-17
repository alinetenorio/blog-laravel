
@foreach ($tags as $tag)
    <form method="post" action="{{ route('tag.update', ['tag'=>$tag]) }}">
        @csrf 
        @method('put')   
        tag: <input name="title" value="{{$tag->title}}" /> 
        <input type="submit" value="editar"/>
        <br/>
    </form>

    <form method="post" action="{{ route('tag.destroy',['tag'=>$tag]) }}">
        @csrf
        @method('delete')
        <input type="submit" value="deletar"/>
    </form>
   
@endforeach