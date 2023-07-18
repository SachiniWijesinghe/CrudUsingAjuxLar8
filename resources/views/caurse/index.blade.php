@extends('layouts.app')


@section('content')

<!-- Add Modal -->
<div class="modal fade" id="caurseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Caurse Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- <form action="{{ url('add-caurse')}}"  method="POST"> -->
      <form action="{{ url('add-caurse')}}"  method="POST">
      @csrf
      <div class="modal-body"> <!-- model body eka form eka athule tynna oni-->


                            <div class="form-group mb-2">
                             <lable for="name">Name:</lable>
                             <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                             <lable for="no_of_modules">Number of modules:</lable>
                             <input type="text" name="no_of_modules" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="time_period">Time Period:</lable>
                             <input type="text" name="time_period" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="price">Price:</lable>
                             <input type="text" name="price" class="form-control">
                            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>


      </form>

    </div>
  </div>
</div>



<!----end Add model-->


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Caurse Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('update-caurse')}}"  method="POST">

      @csrf
      @method('PUT')
      <div class="modal-body">
        <!-- model body eka form eka athule tynna oni-->


                          <input type="text" name="_id" id="caurse_id" value=""  class="form-control">                                     -->

                          <div class="form-group mb-2">
                             <lable for="name">Name:</lable>
                             <input type="text" id="name" value="" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                             <lable for="no_of_modules">Number of modules:</lable>
                             <input type="text"  id="no_of_modules" value="" name="no_of_modules" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="time_period">Time Period:</lable>
                             <input type="text"  id="time_period" value="" name="time_period" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="price">Price:</lable>
                             <input type="text"  id="price" value="" name="price" class="form-control">
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>


      </form>

    </div>
  </div>
</div>



<!----end edit model-->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Caurse Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('delete-caurse')}}"  method="POST">

      @csrf
      @method('DELETE')
      <div class="modal-body">
        <!-- model body eka form eka athule tynna oni-->


        <p>Confirm to delete Data ?</p>

        <input type="text" id="deleting_id" name="delete_caurse_id">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes Delete</button>
      </div>


      </form>

    </div>
  </div>
</div>



<!----end Delete model-->


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">


            @if (session('status'))

              <div class="alert alert-success" role="alert">
                {{session("status")}}
              </div>

            @endif


            <div class="card">
                <div class="card-header">
                    <h1>
                        Caurse Data
                        <button type ="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#caurseModal" >Add Caurse</button>
                    </h1>
                </div>
                <div class="card-body">


                <table class="table table-bordered" id="myTable">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>No Of Modules</th>
                    <th>Time Period</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($members as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>

                      <td>{{$item->no_of_modules}}</td>

                      <td>{{$item->time_period}}</td>

                      <td>{{$item->price}}</td>
                                                                        <!-- this class name is using in ajax below -->

                      <td><button type="button" value="{{$item->id}}" class=" edit-btn   btn btn-success">Edit</button></td>

                      <td><button type="button" value="{{$item->id}}" class=" delete-btn   btn btn-danger">Delete</button></td>


                    </tr>
                    @endforeach
                  </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>








  $(document).ready(function(){

    // data table eka load krnna
   // let table = new DataTable('#myTable');
   $('#myTable').DataTable();


    //delete
    $(document).on('click', '.delete-btn', function(){
     var caurse_id = $(this).val();
     alert(caurse_id);
     $('#deleteModal').modal('show');
     $(deleting_id).val(caurse_id );
    });



    //edit

                           //btn eke class name eka
    $(document).on('click', '.edit-btn', function(){

        var caurse_id = $(this).val();
        // alert(caurse_id);
        $('#editModal').modal('show');

        //dn modal eka cll krnna oni
       $.ajax({
        type:"GET",
        url:"/editCaurse/"+caurse_id,

        success:function(response){
           // console.log(response);
           // console.log(response.stu.name);
          //model eke id eka     //db tble eke values
           $('#name').val(response.cau.name);
           $('#no_of_modules').val(response.cau.no_of_modules);
           $('#time_period').val(response.cau.time_period);
           $('#price').val(response.cau.price);
           $('#caurse_id').val(response.cau.id);

        }
       })
    });
  });
</script>
@endsection

