<h3>This is the users page</h3>
<table class="table">
 <thead>
    <tr>
        <td>name</td>
        <td>Email</td>
        <td>created at</td>
        <td>updated at</td>
    </tr>
 </thead>
 @foreach($users as $user)
    <tbody>
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
    </tbody>
 @endforeach
</table>