@extends('layout.dashboard-layout')
@section('content')

<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          {{-- <div>
            <h2 class="text-white fw-bold">BARANGAY CLEARANCE</h2>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="page-inner">
      <div class="row mt--2">
        <div class="col-md-12">
            {{-- <div class="card-tools mb-2">
                <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                  <i class="fa fa-print"></i>
                  Print Certificate
                </button>
              </div> --}}
          <div class="card">
            <div class="card-body mb-5" style="padding: 5%; justify;" id="printThis">
              <div class="d-flex flex-wrap justify-content-around" style="border-bottom:2px solid black">
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
                  <h5 class="fw-bold text-uppercase mb-0">BARANGAY {{$settings->barangay_name}}</h5>
                  @endforeach
                  <div class="text-center">
                    <h4 class="mt-4 fw-bold">OFFICE OF THE BARANGAY CAPTAIN</h4>
                  </div>
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
                    <h2 class="mt-4 fw-bold mb-5 text-center">BARANGAY CLEARANCE</h2>
                  </div>

                  <h4 class="mt-5">TO WHOM IT MAY CONCERN:</h4>
                  @foreach($setting as $settings)
                    <img style="height: 650px; opacity: 0.3; position: absolute; margin-left: 15%;" src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/-image.png')}}">
                  @endforeach

                  <h4 class="mt-3" style="text-indent: 40px;">
                    This is to certify that the person whose name and right thumb prints appear hereon has requested a RECORD CLEARANCE from this office and the result(s) is/are listed below:
                  </h4>

                    <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-3" style="text-align: left;">LAST NAME</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-3" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->last_name}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">GIVEN NAME</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->first_name}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">MIDDLE NAME</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->middle_name}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">GENDER</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->gender}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">CITIZENSHIP</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->citizenship}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">STREET</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->street}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">BIRTHDATE</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->birthdate}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">BIRTHPLACE</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->place_of_birth}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">MARITAL STATUS</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->civil_status}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">OCCUPATION</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{$cer->occupation}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">REMARKS</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: ------------- </h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">DATE ISSUED</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: {{ Carbon\Carbon::parse($cer->created_at)->format('F d, Y') }}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">AMOUNT PAID</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: -------------</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1" style="text-align: left;">OR NUMBER</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1" style="text-indent: 10px; border-bottom:1px solid black;">: ----------</h4>
                            </div>
                        </div>

                  </div>
                  <div class="col-5">
                    <div class="row">
                        <div class="col-12" style="margin-left:95px; margin-top:30px;">
                         <div class="border mb-3" style="height:150px;width:200px">
                            <img class="img-view" style="margin-left: 30px; padding: 8px;" src="{{$cer->resident_image ? asset ('storage/' .$cer->resident_image) : asset('/storage/images/-image.png')}}" alt="Picture of the Person in Details"/>
                           <h4 class="mt-3" style="padding-left:60px;">PICTURE</h4>
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
                   <h4 class="mt-3" style="text-indent: 40px;">This certification issued from the purpose of Valid for 6 months from date issued.</h4>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="border" style="height:350px;width:400px;margin-top:30px;margin-left:80px"></div>
                        <h4 class="text-uppercase" style="text-indent:150px; padding-top:10px; ">NOT VALID WITHOUT SEAL</h4>
                      </div>
                      <div class="col-md-6">
                        <div class="pt-5 text-center mr-4">
                            <h4 class="fw-bold mt-5 text-uppercase">

                              <u>{{$barangay_head->name}}</u><br /> 
                              <p>
                                {{-- {{$official->position}}--}} PUNONG BARANGAY
                              </p>
                            </h4>
                          </div>
                        <div class="p-3 text-center">
                          <h4 class="fw-bold mt-5 text-uppercase">
                            {{-- {{$official->name}} --}}<u> {{$barangay_secretary->name}}</u>
                            <p>
                              {{-- {{$official->position}} --}}BARANGAY SECRETARY
                            </p>
                          </h4>
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
    $(document).ready(function(){
        var printContents = $("body").html();
         var originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
         setTimeout(function(){
                 window.close();
      }, 5000);

    })
    </script>
@endsection
