<form action="/dashboard/{{$data->dashboard_id}}" method="POST">
@csrf
@method("PUT")
<input type="text" name="name" value = "{{$data->name}}"/>
<input type="submit"/>
</form>
