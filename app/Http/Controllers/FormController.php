<?php

namespace App\Http\Controllers;
use App\Form;
//use \Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Carbon\Carbon;

class FormController extends Controller
{
    public function store(Request $request){
        $photo ="";
        if(Input::hasFile('photo')){
            $file = Input::file('photo');
            $photo = $file->getClientOriginalName();
            $file->move('uploads',$file->getClientOriginalName());

        }
//        Form::create($request->all());
        $current_time = Carbon::now()->addHour(6);
        $name = $request->input('name');
        $insert_photo = $photo;
        $schoolName = $request->input('schoolName');
        $sscRegNo = $request->input('sscRegNo');
        $sscRollNo = $request->input('sscRollNo');
        $gpa = $request->input('gpa');
        $presentAddress = $request->input('presentAddress');
        $permanentAddress = $request->input('permanentAddress');
        $occupation = $request->input('occupation');
        $currentBusinessOrWorkingOrg = $request->input('currentBusinessOrWorkingOrg');
        $expertise = $request->input('expertise');
        $mobileNumber = $request->input('mobileNumber');
        $fbIdName = $request->input('fbIdName');
        $selfDescription = $request->input('selfDescription');
        $bloodGroup = $request->input('bloodGroup');
        $board = $request->input('board');
        $policeStation = $request->input('policeStation');
        $district	 = $request->input('district');
        $designation = $request->input('designation');
        $interest = $request->input('interest');

        $data = array(
            array('name'=>$name, 'photo'=>$insert_photo,'schoolName'=>$schoolName,'sscRegNo'=>$sscRegNo,
                'sscRollNo'=>$sscRollNo,'gpa'=>$gpa,'presentAddress'=>$presentAddress,'permanentAddress'=>$permanentAddress,
                'occupation'=>$occupation,'currentBusinessOrWorkingOrg'=>$currentBusinessOrWorkingOrg,'expertise'=>$expertise,'mobileNumber'=>$mobileNumber,
                'fbIdName'=>$fbIdName,'selfDescription'=>$selfDescription,'bloodGroup'=>$bloodGroup,'board'=>$board,
                'policeStation'=>$policeStation,'district'=>$district,'designation'=>$designation,'interest'=>$interest,'created_at' => $current_time)
                );
                $flag = Form::insert($data);

        return redirect('/');
    }
}
