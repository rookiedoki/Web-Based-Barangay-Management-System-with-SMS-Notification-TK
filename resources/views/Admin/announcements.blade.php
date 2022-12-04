@extends('layout.dashboard-layout')

@section('content')

<h3>Announcements <i class="fas fa-bullhorn fe-50"></i></h3>  

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa print"></i></a> --}}
      <div class="card shadow">
        <div class="card-body">
          <div class="toolbar">
            <form class="form">
              <div class="form-row">
              </div>
            </form>
          </div>
    
         

          @foreach($ann as $announcements)
        
          <section id="skills" class="skills">
            <div class=" pt-6 pt-lg-0 content"  data-aos-delay="100">
              <h1 class="text-center">{{$announcements->title}}</h1>
            </div>
            <div class="container" data-aos="fade-up">
              <div class="row">
                <div class="col-lg-3 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                  <img class="img-fluid" id="preview" src="{{$announcements->image ? asset ('storage/' .$announcements->image) : asset('/storage/no/-image.png')}}" style="width:200px; heigh:10px"/>
                </div>
                <div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                  <p class="fst-italic">
                    {{$announcements->description}}
                  </p>
                
      
                      <div class="col-sm-12">
                          <div class="form-group">
                                  <textarea  id="diss_summernote"  class="form-control" name="content" rows="5" cols="10"> {{$announcements->content}} </textarea>
                          @Error('content')
                               <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
          
                          </div>
                      </div>
                    <hr>
                   
                  </div> 
                    </div>
                    <a href="#editAnnouncementModal{{$announcements->id}}" class="btn btn-success float-right" data-toggle="modal" ><i class="fas fa-pencil" ></i> <span>Edit Announcements</span></a>
                  </div>
                </div>
              </div>
      
            </div>
          </section><!-- End Skills Section -->


    
  {{-- ---------------------------------------------Edit Announcements----------------------------------------- --}}
              
              <div id="editAnnouncementModal{{$announcements->id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
        
                      <form action="/updateAnouncements/{{$announcements->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Anouncements</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            
                           
                        <div class="row register-form">
                            <div class="col-sm-12">
                                <div class="modal-body">					
                                    <div class="form-group">
                                        <label >Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$announcements->title}}" required autocomplete="title">
                                    
                                        @Error('title')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="row register-form">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="modal-body">
                                    <p><label for="description">Description</label></p>
                                    <textarea id="" class="form-control" name="description"  rows="2" cols="50">  {{$announcements->description}} </textarea>
                            </div>
        
                            @Error('description')
                                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
        
                            </div>
                        </div>
                    </div>
                    
                    <div class="row register-form">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="modal-body">
                                    <p><label for="content">Content</label></p>
                                    <textarea  id="dis_summernote"  class="form-control" name="content" rows="5" cols="50"> {{$announcements->content}} </textarea>
                            </div>
        
                            @Error('content')
                                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
        
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                      <div class="form-group">
                      <label class="labelImage">Image</label>
                      <input type="file"  name="image" id="image">
                   </div>
                  
                   @Error('mage')
                   <p class="text-danger text-md mt-1">{{$message}}</p>
                @enderror
              
             
              </div>
        
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-success" value="Save">
                            </div>
                            
                        </form>
                        
                    </div>
                  
                    
           </div>
        
                </div>
      
        
      
                @endforeach

          </table>
       
    
        </div>
      </div>
    </div>


    </div> 
  </div> 
  <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
<script>
    $(document).ready(function() {
        $("#my_summernote").summernote(); 
        $('.dropdown-toggle').dropdown();
    });
  </script>

<script>
    $(document).ready(function() {
        $("#dis_summernote").summernote(); //disable
        $('.dropdown-toggle').dropdown();
    });
  </script>

<script>
    $(document).ready(function() {
        $("#diss_summernote").summernote({airMode:true}).next().find(".note-editable").attr("contenteditable",false); //not to
        $('.dropdown-toggle').dropdown();
    });
  </script>
@endsection