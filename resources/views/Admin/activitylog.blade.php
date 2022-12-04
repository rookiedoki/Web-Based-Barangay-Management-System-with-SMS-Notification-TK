@extends('layout.dashboard-layout')
@section('content')
<div class="row">
  <!-- Small table -->
  <div class="col-md-12 my-4">
    <h2 class="h4 mb-1">Activity Logs</h2>
    {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
    <div class="card shadow">
      <div class="card-body">
        <div class="toolbar">
          <form class="form">
            <div class="form-row">
              <div action="" class="form-group col-auto">
                <label for="search" class="sr-only">Search</label>
                <input type="text" value="{{\Request::get('search')}}" class="form-control" id="search" name="search" value="" placeholder="Search">
              </div>
              <div class="form-group col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
              <!--- per page -->
              <div class="form-group col-auto">
                <label for="perPage" class="sr-only">Per Page</label>
                <select class="form-control" id="perPage" name="perPage">
                  <option value="{{ \Request::get('perPage') ?? '10'}}" selected>{{ \Request::get('perPage') ?? 'Per page'}}</option>
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="50">50</option>
                </select>
              </div>
              <!-- sort by -->
              <div class="form-group col-auto">
                <label for="sortBy" class="sr-only">Sort By</label>
                <select class="form-control" id="sortBy" name="sortBy">
                  <option value="{{ \Request::get('sortBy') ?? 'created_at desc' }}" selected>{{ \Request::get('sortBy') ?? 'Sort By'}}</option>
                  <option value="id desc">id desc</option>
                  <option value="id asc">id asc</option>
                  <option value="action desc">action desc</option>
                  <option value="action asc">action asc</option>
                  <option value="created_at desc">created At desc</option>
                  <option value="created_at asc">created At asc</option>
                </select>
              </div>
          </form>
          <script>
            $(document).ready(function() {
              $('#perPage').change(function() {
                this.form.submit();
              });
              $('#sortBy').change(function() {
                this.form.submit();
              });
            });
          </script>
        </div>
        <!-- table -->
        <table class="table table-borderless table-hover">
          <thead>
            <tr>
              <th>User ID</th>
              <th>Action</th>
              <th>Table</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($logs as $log)
            <tr>
              <td class="show">{{ $log->user_id }}</td>
              <td class="show">{{ $log->action }}</td>
              <td class="show">{{ $log->table_name }}</td>
              <td class="show text-sm"><small>{{\Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</small></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $logs->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
