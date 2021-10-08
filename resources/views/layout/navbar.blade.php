<!DOCTYPE html>
<form method="POST" action="{{route('logout')}}">
@csrf
<button class="nav-item nav-link active" type="submit">Logout</button>
</form>