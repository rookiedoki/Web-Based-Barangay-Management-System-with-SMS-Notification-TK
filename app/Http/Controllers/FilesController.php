<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\ActivityLog;
use App\Models\File;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FilesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  /**Accomplishment Report*/
  public function reports(Request $request, $category)
  {
    $request->validate([
      'search' => 'nullable|string',
      'show' => 'nullable|string|in:yes,no',
    ]);
    // $files = File::paginate(5);
    $files = File::where('category', '=', $category ?? 'accomplishment')
      ->when($request->show == 'yes', function ($query){
        return $query->onlyTrashed();
      })
      ->when($request->search, function ($query) use ($request) {
        return $query->where('name', 'like', '%' . $request->search . '%');
      })
      ->orderBy('id','DESC')->get();

    return view('admin.compilationOfReports.reports', ['files' =>  $files, 'category' => $category]);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function create()
  {
    return view('admin.compilationOfReports.create');
  }
  public function printDocument(Request $request){
    $data = $request->all();
    $selectQuery = File::find($data['id']);

    $returnHtml = $selectQuery->description;

    $pdf = PDF::loadView('print_data', array('returnHtml'=>$returnHtml));
    // $pdf = PDF::loadView('test');
    return $pdf->download($selectQuery->name.'.pdf');

  }
  public function deletefile($id)
  {
    $file = File::find($id);
    $file->delete();

    ActivityLog::log(
      'deleted file with id ' . $file->id . ' ' . $file->name,
      'files',
      $file->id,
    );

    return back()->with('message', 'File Hidden');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  StoreFileRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreFileRequest $request, $category)
  {
    $fileName = $request->file->getClientOriginalName();

    $type = $request->file->getClientMimeType();
    $size = $request->file->getSize();

    // rename the file

    $request->file->move(public_path('file'), $fileName);



    $file = File::create([
      // 'user_id' => auth()->id(),
      'category' => $category,
      'name' => $fileName,
      'type' => $type,
      'size' => $size,
    ]);

    ActivityLog::log(
      'uploaded a file ' . $fileName,
      'files',
      $file->id
    );

    return back()->withSuccess(__('File added successfully.'));
  }

  public function download(Request $request, $file)
  {
    return response()->download(public_path('assets/' . $file));
  }

  public function viewFile($id)
  {
    $file = File::find($id);
    return view('admin.compilationOfReports.reports', ['file' => $file]);
  }

// Create Document

//   public function createdocument(){
//     $files= Files::all();
//     return view('admin.compilationOfReports.reports',['files'=>$files]);
// }
// // Update Document
// public function updateDocument(Request $request, File $createdocument){
//     // dd($request->all());
//     $formFields = $request->validate([
//         'title' =>'required',
//         'content' =>'required',
//     ]);
//     $createdocument->update($formFields);
//     return back()->with('message', 'File Updated Successfully!');
// }

//Announcement Storing Data
public function documentStore(Request $request){

    $formFields = $request->validate([
        'title' =>'required',
        'content' =>'required',
    ]);

    $document = CreateDocument::create($formFields);

    // ActivityLog::log(
    //     'posted an announcement about' . $announcement->title,
    //     'announcements_table',
    //     $announcement->id,
    //   );

    return back()->with('message', 'File Saved!');
}


public function deleteDocument($id)
{
$cd=CreateDocument::find($id);

$cd->delete();

return back()->with('message', 'Document Deleted Succesfull');
}

  public function showFunctions(Request $request,$postMode){
    $data = $request->all();
    $user = Auth::user();
    if($request->ajax()){
      return array('success'=>0,'message'=>'Undefined Method');
    }else{
      if($postMode=='add-document'){
        $insert = new File();
        $insert->category = $data['category'];
        $insert->description = $data['content'];
        $insert->name = $data['title'];
        if($insert->save()){
          return back();
        }
      }else{

      }
    }
  }
}
