<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Ajax Editable Table</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    @php
        $customer = DB::table('customers')->get();    
    @endphp

   <div class="container mt-5 card">

    <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Sl</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($customer as $key=>$row)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td class="editable" data-type="text" data-name="name" data-pk="{{ $row->id }}">{{$row->name}}</td>
              <td class="editable" data-type="text" data-name="phone" data-pk="{{ $row->id }}">{{$row->phone}}</td>
              <td>
                <a href="#" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
              </td>
            </tr>        
            @endforeach
         
        </tbody>
      </table>

   </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script>
         $.fn.editable.defaults.mode = "inline";

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token()}}'
                }
            });

            $('.editable[data-name="name"]').editable({
                url: "/lead/manage",
                type: 'text',
                title: 'Enter Name'
                });

                $('.editable[data-name="phone"]').editable({
                url: "/lead/manage",
                type: 'text',
                title: 'Enter Name'
                });

    </script>
  </body>
</html>