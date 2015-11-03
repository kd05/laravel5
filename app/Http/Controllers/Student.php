<?php

namespace App\Http\Controllers;
//
use DB;
////use App\Quotation;
//use Illuminate\Http\Request;
use Request;
class Student extends Controller
{
    
    public function index(){
        
//       return View::make('Admin/student');
         return view('Admin.student');
    }
    
    
//    Add record
    public function saverecord(Request $request)
    {
        $studentrequest = $request->all();

        $data = array(
            'student_name' => $studentrequest['studentname'],
            'gender' => $studentrequest['gender'],
            'phone' => $studentrequest['phone']
        );
        
        $check = DB::table('student')->insert($data);
        
        if($check > 0)
        {
            echo "Record Added Successfully..!!!";
        }
        else
        {
             echo "Error..!!!";
        }
        
    }
    

    public function editdata()
    {
        $data = Request::all();
        echo $data['id'];
        echo "<pre>"; print_r($data);
        exit();
    }




//    display data
    public function getdata() 
    {
        $store_data = "";
        $data = DB::table('student')->get();
        
         foreach ($data as $value)  
         {
             if($value->gender == 0) { $gender = "Male";   }
             else {  $gender = "Female";   }
             
            $store_data .= "<tr>"
                                . "<td>$value->id</td>"
                                . "<td>$value->student_name</td>"
                                . "<td>$gender</td>"
                                . "<td>$value->phone</td>"
                                . "<td><a data-id='$value->id' href='javascript:void(0);' class='edit'>Edit</a> | <a data-id='$value->id' href='javascript:void(0);' class='edit'>Delete</a></td>"
                        . "</tr>";      
         }       
         
         return $store_data;
         exit;        
    }
    
}
    


?>
