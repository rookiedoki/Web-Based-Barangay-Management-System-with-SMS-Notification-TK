@extends('layout.dashboard-layout')
@section('content')

<style>
  .card{
      font-family: Arial;
      color:black;
  }
</style>
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
                    <p class="mt-4 fw-bold fs-3 text-center">BARANGAY CERTIFICATION</p>
                  </div>

                  <p style="padding-top:90px; font-size:13pt;">RE/ SUBJECT: <b> CERTIFICATION OF RESIDENCY</b></p>

                  @foreach($setting as $settings)
                  <img style="height: 550px; opacity: 0.3; position: absolute; margin-left: 18%;" src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
                @endforeach

                  <p class="mt-5 fs-6">TO WHOM IT MAY CONCERN:</p>

                  <p class="mt-3 fs-6 text-lowercase" style="text-indent: 40px;">This is to certify that {{$cer->first_name}} {{$cer->last_name}}, of legal age, {{$cer->civil_status}}, {{$cer->citizenship}} is a bonafide resident with postal address at <span class="text-capitalize">{{$cer->street}}, @foreach($setting as $settings){{$settings->barangay_name}}.</span></p>
                    @endforeach
                    <p class="mt-3 fs-6" style="text-indent: 40px;">Further certifies that the above-named person has been a resident of this barangay since birth at present.</p>

                    <p class="mt-3 fs-6" style="text-indent: 40px;">Given this on <?= date('l jS \of F Y') ?>, at the office of the Punong Barangay, @foreach($setting as $settings) {{$settings->barangay_name}},@endforeach Camarines Sur Philippines.
                    </p>
                    <p class="text-uppercase fs-6" style="margin-top:180px;"><i> NOT VALID WITHOUT DRY SEAL:</i></p>
                </div>
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
                <div class="col-md-9">
                  <div class="">
                    <div style="height:150px;width:300px">
                      <p style="font-size: 10pt;">
                        CONTROL NUMBER: <br />
                        OR NUMBER: <br />
                        DATE ISSUED:<span class="fw-bold"> <?= date('F j, Y') ?> </span><br>
                        PLACE ISSUED:
                        <span class="fw-bold">{{$settings->barangay_name}}</span>
                        <br>
                        AMOUNT PAID:<span class="fw-bold">&#8369; 75.00</span><br>
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
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
  </script>
@endsection
