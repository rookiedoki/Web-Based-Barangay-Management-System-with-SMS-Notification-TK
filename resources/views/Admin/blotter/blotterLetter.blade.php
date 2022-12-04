@extends('layout.dashboard-layout')
@section('content')

<div class="main-panel">
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          {{-- <div>
            <h2 class="text-white fw-bold">Generate Report</h2>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="page-inner">
      <div class="row mt--2">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-head-row">
                <div class="card-title"></div>
                {{-- <div class="card-tools">
                  <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                    <i class="fa fa-print"></i>
                    Print Report
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
                  {{-- @foreach($setting as $settings) --}}
                  <img src="/assets2/img/nbua.png" class="img-fluid" width="100" style="padding-bottom: 15%">
                  {{-- @endforeach --}}
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                  <div class="text-center">
                    <h4 class="mt-4 fw-bold">OFFICE OF THE BARANGAY CAPTAIN</h4>
                  </div>
                  <div class="text-center">
                    <h4 class="mt-4 fw-bold mb-5 text-center">BLOTTER REPORT</h4>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col">
                      <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Complainant:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px">
                          <span class="fw-bold" style="font-size:15px">{{ $blo->complainant }}</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Victim:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px">
                                                    <span class=" fw-bold" style="font-size:15px">
                          {{ $blo->victim }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Location:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                                    <span class=" fw-bold" style="font-size:15px">{{ $blo->location }}</span>
                        </div>
                      </div>

                    </div>
                    <div class="col">
                    <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Time:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                                    <span class=" fw-bold" style="font-size:15px">{{ $blo->time }}</span>
                        </div>
                        </div>

                      <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Respondent:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                                    <span class=" fw-bold" style="font-size:15px">{{ $blo->respondent }}</span>
                        </div>
                      </div>
                      {{-- <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Type:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                                    <span class=" fw-bold" style="font-size:15px">{{ $blo->type  }}</span>
                        </div>
                      </div> --}}
                      <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Date:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                                    <span class=" fw-bold" style="font-size:15px"> {{ $blo->date }}</span>
                        </div>
                      </div>
                      {{-- <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Status:</h6>
                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; font-size:20px"">
                                                    <span class=" fw-bold" style="font-size:15px">{{ $blo->status }}</span>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group row">
                        <h6 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Blotter Details:</h6>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                        <textarea class="form-control fw-bold mb-5" style="font-size:15px" rows="5" disabled>{{ $blo->details }}</textarea>
                      </div>
                    </div>
                  </div>
                </div><br /><br />

                <div class="col-md-12">
                  <div class=" mt-5 text-right mr-3 mb-3">
                    <h6 class="fw-bold mb-0 text-uppercase"><u>Rafael F. Folloso</u></h6>
                    <p>PUNONG BARANGAY</p>
                  </div><br />
                  <div class=" text-right mr-3">
                    <h6 class="fw-bold mb-0 text-uppercase"><u>Sherrey Tagongtong</u></h6>
                    <p>BARANGAY SECRETARY</p>
                  </div>
                </div>
                <div class="col-md-12 d-flex flex-wrap justify-content-end">
                  <div class="p-3 text-center">
                    <div class="border mb-3" style="height:100px;width:230px">
                      <p class="mt-5 mb-0 pt-3">Right Thumb Mark</p>
                    </div>
                    <h2 class="fw-bold mb-0">______________</h2>
                    <p>Complainant's Signature</p>
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
  function openModal() {
    $('#barangayClearance').modal('show');
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
