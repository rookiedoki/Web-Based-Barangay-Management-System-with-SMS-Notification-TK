@extends('layout.dashboard-layout')
@section('content')
<h2 class="h2 mb-1">Request Certificate </h2>
<div class="card shadow">
  <div class="card-body">
    <div class="toolbar">
      <form class="form">
        <div class="form-row">
          <div action="/residents" class="form-group col-auto">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" id="search" name="search" value="{{\Request::get('search')}}" placeholder="Search">
          </div>
          <div class="form-group col-auto">
            <label for="category" class="sr-only">Status</label>
            <select class="form-control" id="status" name="status">
              <option disabled>Select Status</option>
              <option value="pending" {{\Request::get('status') === 'pending' ? 'selected' : ''}}>Pending</option>
              <option value="approved" {{\Request::get('status') === 'approved' ? 'selected' : ''}}>Approved</option>
              <option value="declined" {{\Request::get('status') === 'declined' ? 'selected' : ''}}>Declined</option>
            </select>
          </div>
          <script>
            $(document).ready(function() {
              $('#status').change(function() {
                this.form.submit();
              });
            });
          </script>
        </div>
      </form>
    </div>
    <!-- table -->
    <table class="table table-borderless table-hover">
      <thead>
        <tr>
          {{-- <th>Image</th> --}}
          <th>Fullname</th>
          <th>Type of Document</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      @foreach($res as $residency)

      <tbody>
        <tr>
          {{-- <td>
            <div class="image-round">
              <img class="imagePreview" src="{{$residency->profile_image ? asset ('storage/' .$residency->profile_image) : asset('/images/-image.png')}}" alt="" />
            </div>
          </td> --}}
          <td width="40%" class="show">{{$residency->fullname}}</td>
          <td width="20%" class="show">{{$residency->doctype}}</td>
          <td width="30%" class="show">{{ Carbon\Carbon::parse($residency->created_at)->format('F d, Y (l)') }}</td>
            <td width="10%">
              @if($residency->status == 'pending')
              <a href="#editResidentsModal{{$residency->id}}" class="edit" data-toggle="modal"><button class="btn"><i class="fas fa-eye fa-minimize"></i></button></a>
              @elseif($residency->status == 'approved')
              <a href="{{url('certificateOfResidency/barangayResidency',$residency->id)}}">
                <span class="badge badge-success p-2">Approved</span>
              </a>
              @elseif($residency->status == 'declined')
              <span class="badge badge-danger p-2">Declined</span>
              @endif
            </td>


            {{-- <td>
              <a href="{{url('certificate/barangayClearance',$certificate->id)}}"><button class="btn"><i class="fas fa-file fa-minimize"></i></button></a>
            <a href="#deleteResidentsModal{{$certificate->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            {{-- <a href="#barangayClearance{{$req->id}}" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip">&#xE254;</i></a> --}}
            {{-- </td> --}}
        </tr>



        <div id="editResidentsModal{{$residency->id}}" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="barangayResidency">Transaction Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div>
                  <div class="form-group">
                    <label>Payment Method</label>
                    <input type="text" class="form-control" name="date" value="{{$residency->paymentMethod}}" disabled>
                  </div>
                  <div class="form-group">
                    <label>Date Issued</label>
                    <input type="text" class="form-control" name="date" value="{{ Carbon\Carbon::parse($residency->created_at)->format('F d, Y (l)') }}" disabled>
                  </div>
                  <div class="form-group">
                    @if (($residency->otherPurpose))
                    <label>Purpose</label>
                    <input type="text" class="form-control" name="date" value="{{$residency->otherPurpose}}" disabled>
                    @else
                    <label>Purpose</label>
                    <input class="form-control" placeholder="Enter Payment Details" name="details" value="{{$residency->purpose}}" disabled>
                    @endif
                    </div>
                  <div class="form-group">
                    @if($residency->referenceNumber)
                    <label>Reference Number</label>
                    <input type="text" class="form-control" name="date" value="{{$residency->referenceNumber}}" disabled>
                    @endif
                </div>
                  <div class="form-group">
                    @if($residency->screenshot)
                    <label>Screenshot of Proof</label>
                    <div id="image-show-area image-fluid">
                      <img src="{{ asset ('screenshot/' .$residency->screenshot)}}" alt="screenshot" style="width: 100%" />
                    </div>
                    @endif
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="name" value="---">
                    <a href="{{url('decline-certificate/'.$residency->id)}}" class="btn btn-danger" class="close">Decline</a>
                    <a href="{{url('certificateOfResidency/barangayResidency',$residency->id)}}" type="submit" class="btn btn-primary">Approve</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <script>
            setTimeout(function(){ openModal(); }, 1000);
        </script> --}}
        </div>

        @endforeach
      </tbody>


    </table>
  </div>
</div>
@endsection
