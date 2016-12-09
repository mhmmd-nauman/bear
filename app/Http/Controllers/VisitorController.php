<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Http\Requests;
use App\Bear;
use App\Visitor;
use App\Http;
use App\models\Fish;
use App;
use Auth;
use Excel;
use PDF;

class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

    }
    public function getvisitor(Request $request){
        
        $user_id = Auth::user()->id;
        switch($request->load){
            case'yesterday':
                $report_title = 'Yesterday - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->whereDate('created_at', '=', date('Y-m-d',  strtotime("-1 day")))->get();
                break;
            case'last7day':
                $report_title = 'Last 7 Days - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->whereDate('created_at', '>=', date('Y-m-d',  strtotime("-30 day")))->get();
                break;
            case'last30day':
                $report_title = 'Last 30 Days - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->whereDate('created_at', '>=', date('Y-m-d',  strtotime("-7 day")))->get();
                break;
            case'viewalldata':
                $report_title = 'View All Data';
                $students = Visitor::all();
                break;
            default:
                $report_title = 'Today - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->whereDate('created_at', '=', date('Y-m-d'))->get();
        }
        //$students = DB::table('students')->get();
        return view('visitors.list_visitors', compact('students'),['report_title'=>$report_title]);
    }
    public function export_visitor_pdf(){
        
        $students = DB::table('students')->get();
        $pdf = PDF::loadView('visitors.list_visitors_pdf', compact('students'));
        return $pdf->download('VisitrsReport.pdf');
    }
    public function export_visitor(){
        //http://laraveldaily.com/laravel-excel-export-eloquent-models-results-easily/
        $students = Visitor::select('id AS ID', 'first_name As First Name', 'last_name AS LastName','mobile As Contact','program as Program','visit_type as CallVisit','information_source as InformationSource','dealt_by as DealtBy','admission_status As AdmissionStatus')->get();
        $excel = App::make('excel');
        Excel::create('visitors', function($excel) use($students) {
            $excel->sheet('Visitors Data', function($sheet) use($students) {
                $sheet->fromArray($students);
            });
        })->export('xls');
    }
    public function getstudent_in_json(Request $request){
        return Visitor::find($request->id)->toJson();
    }

    public function getstudents(Request $request){
        
        $user_id = Auth::user()->id;
        switch($request->load){
            case'yesterday':
                $report_title = 'Yesterday - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->where('admission_status','=','done')
                    ->whereDate('created_at', '=', date('Y-m-d',  strtotime("-1 day")))->get();
                break;
            case'last7day':
                $report_title = 'Last 7 Days - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->where('admission_status','=','done')
                    ->whereDate('created_at', '>=', date('Y-m-d',  strtotime("-30 day")))->get();
                break;
            case'last30day':
                $report_title = 'Last 30 Days - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->where('admission_status','=','done')
                    ->whereDate('created_at', '>=', date('Y-m-d',  strtotime("-7 day")))->get();
                break;
            case'viewalldata':
                $report_title = 'View All Data';
                $students = Visitor::where('admission_status','=','done');
                break;
            default:
                $report_title = 'Today - Mine';
                $students = Visitor::where('dealtby_id','=',$user_id)
                    ->whereDate('created_at', '=', date('Y-m-d'))->get();
        }
        //$students = DB::table('students')->get();
        return view('students.list_students', compact('students'),['report_title'=>$report_title]);
    }
     public function getpicnic(){
        $users = DB::table('picnics')->get();

        return view('my.picnic', ['users' => $users]);
    }
     public function getfish(){
        $users = DB::table('fish')->get();

        return view('my.fish', ['users' => $users]);
    }
     public function gettree(){
        $users = DB::table('trees')->get();

        return view('my.trees', ['users' => $users]);
    }
    
    public function add_visitor(Request $request){
        $visitor = new Visitor();
        $visitor->first_name = $request->get('first_name');
        $visitor->last_name  = $request->get('last_name');
        $visitor->program    = $request->get('program');
        $visitor->visit_type = $request->get('visit_type');
        $visitor->information_source = $request->get('information_source');
        $visitor->mobile     = $request->get('mobile');
        $visitor->dealtby_id = Auth::user()->id;
        $visitor->dealt_by   = Auth::user()->name;
        $visitor->save();
        $request->session()->flash('flash_message', 'Visitor was successful added!');
        return redirect('visitor');
        //return back();
    }
    public function remove_visitor(Request $request){
         Visitor::destroy($request->visitor_id);
         $request->session()->flash('flash_message', 'Visitor was successful removed!');
         return back();
    }

}
