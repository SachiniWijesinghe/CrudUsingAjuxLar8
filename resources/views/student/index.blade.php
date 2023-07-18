
@extends('layouts.app')


@section('content')

<!-- Add Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('add-student')}}"  method="POST">
      @csrf
      <div class="modal-body"> <!-- model body eka form eka athule tynna oni-->


           <!--              <div class="form-group mb-3">
                             <lable for=""></lable>
                             <input type="text" name="" class="form-control">
                              </div>                                                         -->

                            <div class="form-group mb-2">
                             <lable for="name">Name:</lable>
                             <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                             <lable for="caurse">Caurse:</lable>
                             <input type="text" name="caurse" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="email">Email:</lable>
                             <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="phone">Phone:</lable>
                             <input type="text" name="phone" class="form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('update-student')}}"  method="POST">

      @csrf
      @method('PUT')
      <div class="modal-body">
        <!-- model body eka form eka athule tynna oni-->


                          <input type="text" name="_id" id="stud_id" value=""  class="form-control">                                     -->

                            <div class="form-group mb-2">
                             <lable for="name">Name:</lable>
                             <input type="text" name="name" id="name" value="" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                             <lable for="caurse">Caurse:</lable>
                             <input type="text" name="caurse" id="caurse" value="" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="email">Email:</lable>
                             <input type="email" name="email" id="email" value="" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                             <lable for="phone">Phone:</lable>
                             <input type="text" name="phone" id="phone" value="" class="form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('delete-student')}}"  method="POST">

      @csrf
      @method('DELETE')
      <div class="modal-body">
        <!-- model body eka form eka athule tynna oni-->


        <p>Confirm to delete Data ?</p>

        <input type="text" id="deleting_id" name="delete_stud_id">

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
                        Students Data
                        <button type ="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#studentModal" >Add Student</button>
                    </h1>
                </div>
                <div class="card-body">


                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>caurse</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($members as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>

                      <td>{{$item->caurse}}</td>

                      <td>{{$item->email}}</td>

                      <td>{{$item->phone}}</td>
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

    //delete
    $(document).on('click', '.delete-btn', function(){
     var stud_id = $(this).val();
     alert(stud_id);
     $('#deleteModal').modal('show');
     $(deleting_id).val(stud_id );
    });



    //edit

                           //btn eke class name eka
    $(document).on('click', '.edit-btn', function(){

        var stud_id = $(this).val();
        // alert(stud_id);
        $('#editModal').modal('show');

        //dn modal eka cll krnna oni
       $.ajax({
        type:"GET",
        url:"/editStudent/"+stud_id,

        success:function(response){
           // console.log(response);
           // console.log(response.stu.name);
          //model eke id eka     //db tble eke values
           $('#name').val(response.stu.name);
           $('#caurse').val(response.stu.caurse);
           $('#email').val(response.stu.email);
           $('#phone').val(response.stu.phone);
           $('#stud_id').val(response.stu.id);

        }
       })
    });
  });
</script>

@endsection
