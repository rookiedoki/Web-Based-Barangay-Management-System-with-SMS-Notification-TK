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
      @foreach($ind as $indigency)
      <tbody>
        <tr>
          {{-- <td>
            <div class="image-round">
              <img class="imagePreview" src="{{$indigency->profile_image ? asset ('storage/' .$indigency->profile_image) : asset('/images/-image.png')}}" alt="" />
            </div>
          </td> --}}
          <td width="40%" class="show"> {{ $indigency->fullname}}</td>
          <td width="20%" class="show">{{ $indigency->doctype}}</td>
          <td width="30%" class="show">{{ Carbon\Carbon::parse($indigency->created_at)->format('F d, Y (l)') }}</td>
          <td width="10%">
            @if($indigency->status == 'pending')
            <a href="#editIndigencyModal{{$indigency->id}}" class="edit" data-toggle="modal"><button class="btn"><i class="fas fa-eye fa-minimize"></i></button></a>
            @elseif($indigency->status == 'approved')
            <a href="{{url('certificateOfIndigency/barangayIndigency/'.$indigency->id)}}">
              <span class="badge badge-success p-2">Approved</span>
            </a>
            @elseif($indigency->status == 'declined')
            <span class="badge badge-danger p-2">Declined</span>
            @endif
          </td>

        </tr>

        {{-- --}}

        {{-- --}}

        <div id="editIndigencyModal{{$indigency->id}}" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="barangayIndigency">Transaction Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <label>Payment Method</label>
                  <input type="text" class="form-control" name="date" value="{{$indigency->paymentMethod}}" disabled>
                </div>
                <div class="form-group">
                    <label>Date Issued</label>
                    <input type="text" class="form-control" name="date" value="{{ Carbon\Carbon::parse($indigency->created_at)->format('F d, Y (l)') }}" disabled>
                  </div>
                <div class="form-group">
                    @if (($indigency->otherPurpose))
                    <label>Purpose</label>
                    <input type="text" class="form-control" name="date" value="{{$indigency->otherPurpose}}" disabled>
                    @else
                    <label>Purpose</label>
                    <input class="form-control" placeholder="Enter Payment Details" name="details" value="{{$indigency->purpose}}" disabled>
                    @endif
                </div>
                <div class="form-group">
                  @if($indigency->referenceNumber)
                    <label>Reference Number</label>
                    <input type="text" class="form-control" name="date" value="{{$indigency->referenceNumber}}" disabled>
                  @endif
                </div>
                <div class="form-group">
                  @if($indigency->screenshot)
                  <label>Screenshot of Proof</label>
                  <div id="image-show-area image-fluid">
                    <img src="{{ asset ('screenshot/' .$indigency->screenshot)}}" alt="screenshot" style="width: 100%" />
                  </div>
                  @endif
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="name" value="---">
                  <a href="{{url('decline-certificate/'.$indigency->id)}}" class="btn btn-danger" class="close">Decline</a>
                  <a href="{{url('certificateOfIndigency/barangayIndigency/'.$indigency->id)}}" type="submit" class="btn btn-primary">Approve</a>
                </div>

              </div>
            </div>
          </div>
          {{-- <script>
            setTimeout(function(){ openModal(); }, 1000);
        </script> --}}
        </div>

      </tbody>

      @endforeach
    </table>
  </div>
</div>
@endsection
