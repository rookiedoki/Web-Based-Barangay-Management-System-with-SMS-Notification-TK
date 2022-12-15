@extends('layout.dashboard-layout')
@section('content')
<style>
    .card{
        font-family: Arial;
        color: black;
    }
</style>
<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          {{-- <div>
            <h2 class="text-white fw-bold">CERTIFICATE OF INDIGENCY</h2>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="page-inner">
      <div class="row mt-2">
        <div class="col-md-12">
            <div class="card-tools mb-2">
                <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                  <i class="fa fa-print"></i>
                  Print Certificate
                </button>
              </div>
          <div class="card" id="printThis">
            <div class="card-body cardprint" style="padding: 5%; justify;" id="printThis">
              <div class="d-flex flex-wrap justify-content-around" style="border-bottom:2px solid black">
                <div class="text-center">
                  @foreach($setting as $settings)
                  <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}" class="img-fluid" width="100" style="padding-bottom: 15%">
                  @endforeach
                </div>
                <div class="text-center">
                  <p class="mb-0">Republic of the Philippines</p>
                  <p class="mb-0">Province of Camarines Sur</p>
                  <p class="mb-0">Municipality of Nabua</p>
                  @foreach($setting as $settings)
                  <p class="text-uppercase mb-0">BARANGAY {{$settings->barangay_name}}</p>
                  @endforeach
                  <p class="mt-4 fs-5 fw-bolder text-center mb-0">OFFICE OF THE PUNONG BARANGAY</p>
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
                    <p class="mt-5 fw-bold fs-3 text-center">BARANGAY INDIGENCY</p>
                  </div>
                  @foreach($setting as $settings)
                  <img style="height: 550px; opacity: 0.3; position: absolute; margin-left: 18%;" src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
                  @endforeach
                  <p style="padding-top:50px; font-size:13pt;">RE/ SUBJECT: <b>CERTIFICATE OF INDIGENCY</b></p>

                  <p class="mt-5 fs-6">TO WHOM IT MAY CONCERN:</p>
                  <p class="mt-3 fs-6" style="text-indent: 40px;">This is to certify that {{$cer->first_name}} {{$cer->last_name}}, of legal age, {{$cer->gender}}, {{$cer->civil_status}} is a permanent resident of {{$cer->street}} has no derogatory record field in our Barangay Office
                  </p>
                  <p class="mt-3 fs-6" style="text-indent: 40px;">The above-named individual who is a bonafide resident of this barangay is a person of good moral character, peace-loving and civic minded citizen.</p>
                  <p class="mt-3 fs-6" style="text-indent: 40px;">This certification/clearance is hereby issued in connection with the subject's application for and for whatever legal purpose it may serve her/his best, and is valid for six(6) months from the date issued.</p>
                  <p class="mt-3 fs-6" style="text-indent: 40px;">Given this on <?= date('l, F j, Y') ?>.</p>
                  <p class="fs-6" style="margin-top:180px;"> <i> NOT VALID WITHOUT DRY SEAL: </i></p>
                </div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="p-3 text-right mr-3">
                      <p class="fw-bold mb-0 text-uppercase fs-6">
                          <u>{{$barangay_head->name}}</u><br />
                          <p class="fs-6">
                           BARANGAY CAPTAIN
                          </p>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="p-3 text-right mr-3">
                      <p class="fw-bold mb-0 text-uppercase fs-6">
                          <u> {{$barangay_secretary->name}}</u>
                          <p class="fs-6">
                            BARANGAY SECRETARY
                          </p>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 d-flex flex-wrap justify-content">
                  <div class="p-3 text-center">
                    <div class="border mb-3" style="height:150px;width:290px">
                      <p class="mt-5 mb-0 pt-5">Right Thumb Mark</p>
                    </div>
                    <p class="fw-bold mb-0">_______________________</h6>
                    <p>Tax Payer's Signature</p>
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


<!--End of Modal-->
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
  </script>
@endsection
