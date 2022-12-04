@extends('layout.dashboard-layout')
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner">
        {{-- <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white fw-bold">CERTIFICATE OF RESIDENCY</h2>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="page-inner">
      <div class="row mt--2">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-head-row">
                {{-- <div class="card-title">CERTIFICATE OF RESIDENCY</div> --}}
                {{-- <div class="card-tools">
                  <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                    <i class="fa fa-print"></i>
                    Print Certificate
                  </button>
                </div> --}}
              </div>
            </div>
            <div class="card-body m-5" id="printThis">
              <div class="d-flex flex-wrap justify-content-around" style="border-bottom:1px solid blue">
                <div class="text-center">
                  @foreach($setting as $settings)
                  <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid" width="100" style="padding-bottom: 15%">
                  @endforeach
                </div>
                <div class="text-center">
                  <h4 class="mb-0">Republic of the Philippines</h4>
                  <h5 class="mb-0">Province of Camarines Sur</h5>
                  <h5 class="mb-0">Municipality of Nabua</h5>
                  @foreach($setting as $settings)
                  <h5 class="fw-bold mb-0">{{$settings->barangay_name}}</i></h5>
                  @endforeach
                </div>
                <div class="text-center">
                  @foreach($setting as $settings)
                  <img src="{{$settings->barangay_logo2 ? asset ('storage/' .$settings->barangay_logo2) : asset('/storage/no/-image.png')}}" class="img-fluid" width="100" style="padding-bottom: 15%">
                  @endforeach
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <div class="text-center">
                    <h5 class="mt-4 fw-bold">OFFICE OF THE BARANGAY CAPTAIN</h5>
                  </div>
                  <div class="text-center">
                    <h5 class="mt-4 fw-bold mb-5 text-center">BARANGAY CERTIFICATION</h5>
                  </div>
                  <h6>RE/ SUBJECT: CERTIFICATION OF RESIDENCY</h6>
                  <h6 class="mt-5">TO WHOM IT MAY CONCERN:</h6>
                  <h6 class="mt-3" style="text-indent: 40px;">This is to certify that <span class="fw-bold" style="font-size:15px">{{$cer->first_name}} {{$cer->last_name}}</span>, of legal age,<span class="fw-bold text-lowercase" style="font-size:15px">{{$cer->civil_status}}</span>, <span class="fw-bold text-lowercase" style="font-size:15px">{{$cer->citizenship}}</span> is a bonafide resident of and with postal address at <span class="fw-bold" style="font-size:15px">{{$cer->street}}</span>, @foreach($setting as $settings)
                    <span class="fw-bold mb-0" style="font-size:15px">{{$settings->barangay_name}}</span>
                    @endforeach
                    <h6 class="mt-3" style="text-indent: 40px;">Further certifies that the above-named person has been a resident of this barangay since birth at present.</h6>

                    <h6 class="mt-3" style="text-indent: 40px;">Given this on <span class="fw-bold" style="font-size:15px"><?= date('l jS \of F Y') ?>, </span> at the office of the Punong Barangay, @foreach($setting as $settings)
                      <span class="fw-bold mb-0" style="font-size:15px">{{$settings->barangay_name}}</span>
                      @endforeach, Camarines Sur Philippines.
                    </h6>
                    <h6 class="text-uppercase" style="margin-top:180px;">NOT VALID WITHOUT SEAL:</h6>
                </div>
                <div class="col-md-12">
                  <div class="p-3 text-right mr-3">
                    <h6 class="fw-bold mb-0 text-uppercase">
                        {{-- {{$official->name}} --}}<u>{{$barangay_head->name}}</u><br />
                        <p>
                          {{-- {{$official->position}}--}} PUNONG BARANGAY
                        </p>
                    </h6>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="p-3 text-right mr-3">
                    <h6 class="fw-bold mb-0 text-uppercase">
                        {{-- {{$official->name}} --}}<u> {{$barangay_secretary->name}}</u>
                        <p>
                          {{-- {{$official->position}} --}}BARANGAY SECRETARY
                        </p>
                    </h6>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="texT">
                    <div style="height:150px;width:300px">
                      <p class="">CONTROL NUMBER: <br>
                        DATE ISSUED: <?= date('F j, Y, g:i a') ?><br>
                        PLACE ISSUED:@foreach($setting as $settings)
                        <span class="fw-bold mb-0" style="font-size:15px">{{$settings->barangay_name}}</span>
                        @endforeach<br>
                        AMOUNT PAID: <br>
                        OR NUMBER:
                      </p><br>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

</div>


<!--End of Modal-->
<script>
  function openModal() {
    $('#barangayResidency').modal('show');
  }

  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>
@endsection
