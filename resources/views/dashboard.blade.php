<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>


    
    <style>
        .mytable{
            width: 60%;
        }

        .mytable > tbody > tr >td{
           border-bottom: 1px solid red;
        }

    </style>


</head>
<body>
    <div style="text-align:center;">
        I am alab <br><br>
        <a href="/dashboard/create">Create</a>
    </div>
        <table class="mytable">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($dashboards as $data)
            <tr>
                <td>{{$data->dashboard_id}}</td>
                <td>{{$data->name}}</td>
                <td><a href="/dashboard/{{$data->dashboard_id}}/edit">EDIT</a> &nbsp; <button onclick="functionDelete({{$data->dashboard_id}})">DELETE</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <form id="form-delete" action="" method="">
            @csrf
            @method('DELETE')
        </form>


<script>

    function functionDelete(id){
       var myForm = document.getElementById('form-delete');

       myForm.action = '/dashboard/' + id;
       // dashboard/5
       myForm.method = 'POST';
       myForm.submit();
       //window.location = '/dashboard';
    }

</script>

        
</body>
</html>