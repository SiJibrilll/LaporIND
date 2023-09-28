<x-layout>
    <form action="/users/update" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="username" value="{{$user->username}}">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>