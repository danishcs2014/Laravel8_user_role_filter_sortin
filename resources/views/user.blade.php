@extends('master')
@section("content")



<div class="container mt-5">
   
<form method="POST" action="/filter" class="form-inline">
    @csrf;
  <div class="form-group">
    <label>Roles</label>
    <select name="role" class="form-control">
    <option value="0" selected>Select Role</option>
@foreach ($roleData as $item)
<option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach
</select>
  </div>
  <div class="form-group">
    <label>industries</label>
    <select name="industrie" class="form-control">
    <option value="0" selected>Select industrie</option>
@foreach ($industrieData as $item)
<option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach
</select>
  </div>
  
  <button type="submit" class="btn btn-default">Filter</button>
   <div class="form-group">
    <label>sorting</label>
    <select id="sort" class="form-control">
    <option value='0'>Select One</option>
  <option value='1'>view all</option>
  <option value='2'>new registered members</option>
  <option value='3'>Profile score</option>
  
</select>
  </div>
</form>


            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">@sortablelink('id')</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">@sortablelink('profile_score')</th>
                        <th scope="col">@sortablelink('registered_on')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->mobile }}</td>
                        <td>{{ $data->profile_score }}</td>
                        <td>{{ $data->registered_on }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
              {!! $users->links() !!}
            </div>
        </div>

        <script type="text/javascript">

        $(document).ready(function(){
            
            $('#sort').change(function() {
              if($(this).val() == '1'){
                
                location.href = "http://127.0.0.1:8000/user-list/?sort=id&direction=asc";
              } else if($(this).val() == '2'){

                location.href = "http://127.0.0.1:8000/user-list/?sort=registered_on&direction=desc";

              } else if($(this).val() == '3'){

                location.href = "http://127.0.0.1:8000/user-list/?sort=profile_score&direction=desc";

              } else {
                
                alert('Please select any one');
              }
              
            });
        });
</script>
@endsection