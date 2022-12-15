@extends('layout.dashboard-layout')
@section('content')

<style>
    .card{
        font-family: Arial;
        color:black;
    }
    p{
       font-size: 12pt;
    }
</style>
<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
    </div>
    <div class="page-inner">
      <div class="row mt--2">
        <div class="col-md-12">
            <div class="card-tools mb-2">
                <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                  <i class="fa fa-print"></i>
                  Print Certificate
                </button>
              </div>
        {{-- <form> --}}
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
                    <p class="mt-4 fw-bold fs-3 text-center">BARANGAY CLEARANCE</p>
                  </div>

                  <p class="mt-5">TO WHOM IT MAY CONCERN:</p>
                  @foreach($setting as $settings)
                    <img style="height: 550px; opacity: 0.3; position: absolute; margin-left: 18%;" src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
                  @endforeach

                  <p class="mt-3" style="text-indent: 40px;">
                    This is to certify that the person whose name and right thumb prints appear hereon has requested a RECORD CLEARANCE from this office and the result(s) is/are listed below:
                  </p>
                    <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-5">
                                <p class="mt-3 fw-bold" style="text-indent: 40px; text-align: left;">LAST NAME</p>
                            </div>
                            <div class="col-5">
                                <p class="mt-3 text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->last_name}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">GIVEN NAME</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent:10px; border-bottom:1px solid black;">: {{$cer->first_name}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">MIDDLE NAME</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->middle_name}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">GENDER</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->gender}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">CITIZENSHIP</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->citizenship}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">STREET</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->street}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">BIRTHDATE</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->birthdate}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">BIRTHPLACE</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->place_of_birth}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">MARITAL STATUS</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->civil_status}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">OCCUPATION</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->occupation}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">REMARKS</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: No Derogatory Record</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">DATE ISSUED</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: {{ Carbon\Carbon::parse($cer->created_at)->format('F d, Y') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">AMOUNT PAID</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">: &#8369; 50.00</p>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-5">
                                <p class="fw-bold" style="text-indent: 40px; text-align: left;">OR NUMBER</p>
                            </div>
                            <div class="col-5">
                                <p class="text-capitalize" style="text-indent: 10px; border-bottom:1px solid black;">:<input type="number"></p>
                            </div>
                        </div> --}}

                  </div>
                  <div class="col-5">
                    <div class="row">
                        <div class="col-12" style="margin-left:95px; margin-top:30px;">
                         <div class="border mb-3" style="height:150px;width:200px">
                            <img class="img-view" style="margin-left: 30px; padding: 8px;" src="{{$cer->resident_image ? asset ('storage/' .$cer->resident_image) : asset('/storage/images/-image.png')}}" alt="Picture of the Person in Details"/>
                           <p style="padding-left:70px; padding-top:15px;">PICTURE</p>
                         </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12" style="margin-left:80px; margin-top:180px;">
                            <div class="p-3 text-center">
                                <div class="border mb-3" style="height:150px;width:200px">
                                  <p class="mt-5 mb-1 pt-5">Right Thumb Mark</p>
                                </div>
                              </div>
                        </div>
                    </div>
                  </div>

                   <p class="mt-3" style="text-indent: 40px;">This certification issued from the purpose {{$cer->purpose}} of valid for 5 months from date issued.</p>

                  </div>

                <div class="row">
                    <div class="col-md-7">
                        {{-- <div class="border" style="height:300px;width:400px;margin-top:30px;margin-left:80px"></div> --}}
                        <p class="text-uppercase" style="text-indent:150px; padding-top:10px; "><i>NOT VALID WITHOUT DRY SEAL:</i></p>
                      </div>
                      <div class="col-md-5">
                        <div class="pt-5 text-center">
                            <p class="fw-bold mt-5 mb-0 text-uppercase">
                              <u>{{$barangay_head->name}}</u><br />
                              <p>
                                BARANGAY CAPTAIN
                              </p>
                            </p>
                          </div>
                        <div class="p-3 text-center">
                          <p class="fw-bold mt-5 mb-0 text-uppercase">
                           <u> {{$barangay_secretary->name}}</u>
                            <p>
                              BARANGAY SECRETARY
                            </p>
                          </p>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <input type="submit" class="btn btn-success" value="Save"> --}}
    {{-- </form> --}}
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
