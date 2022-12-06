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
          <div class="card">
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
                    <h5 class="mt-4 fw-bold mb-5 text-center">BARANGAY INDIGENCY</h5>
                  </div>
                  <h6>RE/ SUBJECT: CERTIFICATE OF INDIGENCY</h6>
                  <h6 class="mt-5">TO WHOM IT MAY CONCERN:</h6>
                  <h6 class="mt-3" style="text-indent: 40px;">This is to certify that <span class="fw-bold" style="font-size:15px">{{$cer->first_name}} {{$cer->last_name}}</span>, of legal age, <span class="fw-bold text-lowercase" style="font-size:15px">{{$cer->gender}}</span>, <span class="fw-bold text-lowercase" style="font-size:15px">{{$cer->civil_status}}</span> is a permanent resident of
                    <span class="fw-bold" style="font-size:15px">{{$cer->street}}</span> has no derogatory record field in our Barangay Office
                  </h6>
                  <h6 class="mt-3" style="text-indent: 40px;">The above-named individual who is a bonafide resident of this barangay is a person of good moral character, peace-loving and civic minded citizen.</h6>
                  <h6 class="mt-3" style="text-indent: 40px;">This certification/clearance is hereby issued in connection with the subject's application for and for whatever legal purpose it may serve her/his best, and is valid for six(6) months from the date issued.</h6>
                  <h6 class="mt-3" style="text-indent: 40px;">Given this on <span class="fw-bold" style="font-size:15px"><?= date('l, F j, Y') ?>.</span></h6>
                  <h6 class="text-uppercase" style="margin-top:180px;">NOT VALID WITHOUT SEAL:</h6>
                </div>
                <div class="col-md-12">
                  <div class="p-3 text-right mr-3">
                    {{-- @foreach ($official as $officials) --}}
                    <h6 class="fw-bold mb-0 text-uppercase">
                        {{-- {{$official->name}} --}}<u>{{$barangay_head->name}}</u>
                        <p>
                          {{-- {{$official->position}} --}}BARANGAY CAPTAIN
                        </p>
                      </h6>
                  </div>
                </div>
                <div class="col-md-12 d-flex flex-wrap justify-content-end">
                  <div class="p-3 text-center">
                    <div class="border mb-3" style="height:150px;width:290px">
                      <p class="mt-5 mb-0 pt-5">Right Thumb Mark</p>
                    </div>
                    <h6 class="fw-bold mb-0">_______________________</h6>
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
