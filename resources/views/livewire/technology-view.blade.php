<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">View Technology</h3>
  </div>

  @if (session()->has('success'))
    <div class="alert mt-3 mb-0" style="color: green;">
        {{ session('success') }}
    </div>
  @endif

  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>Sr No</th>
        <th>Technology Name</th>
        <th>Status</th>
        <th>Edit Data</th>
        <th>Delete Data</th>
      </tr>
      </thead>
      
      @foreach($technologyData as $tech)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$tech->tech_name}}</td>
        <td>
          <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="statusChange{{$tech->id}}"
                      wire:change="updateStatus({{$tech->id}}, {{$tech->status}})"
                      {{$tech->status == 1 ? 'checked' : ''}}>
              <label class="custom-control-label" for="statusChange{{$tech->id}}"></label>
          </div>
        </td>
        <td><button wire:click="edit({{$tech->id}})" class="btn btn-primary">Edit</button></td>
        <td><button wire:confirm="Are you sure to delete?"  wire:click="delete({{$tech->id}})" class="btn btn-primary">Delete</button></td>
      </tr>
      @endforeach

    </table>
  </div>
</div>
                