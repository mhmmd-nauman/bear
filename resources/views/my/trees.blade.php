@extends('layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: #ac2925;
          }  
    </style>

@section('content')
<div><button type="button" class="btn btn-danger glyphicon glyphicon-star"  style=" margin-left: 70%" >Insert New Picnic</button></div>
<div class=" container">
            <table style="margin-top: 5%; " class="table table-hover" >
                        <tr>
                            <th >ID</th>
                            <th >type</th>
                            <th >age</th>
                            <th>bear_id</th>
                            <th>Edit / Delete</th>
                        </tr>
                        <?php
                        $users=json_decode($data);
                        //print_r($users) ;
                    ?>
                    <?php foreach ($users as $user):?>
                        <tr>
                            <td><?php echo $user->id;?></td>
                            <td><?php echo $user->type ; ?></td>
                            <td><?php echo $user->age ; ?></td>
                            <td> <?php echo $user->bear_id	; ?></td>
                           <td><button class="btn btn-danger glyphicon glyphicon-refresh">Edit</button> &nbsp;&nbsp;<button class="btn btn-danger glyphicon glyphicon-remove">Remove</button>


                        </tr>
                        
                    <?php endforeach; ?>
             </table>
    
</div>
@endsection



