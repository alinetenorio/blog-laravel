
@foreach ($users as $user)
    <form method="post" action="{{ route('user.update', ['user'=>$user]) }}">
        @csrf 
        @method('put')   
        name: <input name="name" value="{{$user->name}}" /> <br/>
        email: <input name="email" value="{{$user->email}}" /> <br/>
        password: <input type="password" name="password" value="{{$user->password}}" /> <br/>
        permission: <input name="permission" value="{{$user->permission}}" /> <br/>
        <input type="submit" value="editar"/>
        <br/>
    </form>

    <form method="post" action="{{ route('user.destroy',['user'=>$user]) }}">
        @csrf
        @method('delete')
        <input type="submit" value="deletar"/>
    </form>
   
@endforeach