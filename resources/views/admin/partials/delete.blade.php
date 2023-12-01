<form class="d-inline-block" action="{{$route}}" method="post" onsubmit="return confirm('{{$message}}')">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>

</form>
