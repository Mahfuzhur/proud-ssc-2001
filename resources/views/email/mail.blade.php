<form action="{{url('/contact')}}" method="post">
    {{csrf_field()}}
    <button type="submit">confirm</button>
</form>