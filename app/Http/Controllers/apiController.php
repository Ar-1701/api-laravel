<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function get_stu(Request $req)
    {
        $id = $req->id;
        if (isset($id)) {
            $data = Student::find($id);
            if (empty($data)) {
                return response()->json(['status' => 200, 'message' => 'No Student Found']);
            } else {
                return response()->json(['status' => 200, 'message' => 'Record Found', 'stu' => $data, 'modelName' => 'Student']);
            }
        } else {
            $data = Student::get();
            // $arr = [];
            $products = [];
            foreach ($data as $key => $val) {
                //              Way -1 to add Data in array
                $array[] = [
                    'id' => $val->id,
                    'name' => $val->name,
                    'age' => $val->age,
                    'city' => $val->city,
                    'created_at' => $val->created_at,
                    'updated_at' => $val->updated_at,
                    'modelName' => "Student"
                ];
                //      Way -2 to add Data in array
                // $arr['id'] = $val->id;
                // $arr['name'] = $val->name;
                // $arr['age'] = $val->age;
                // $arr['city'] = $val->city;
                // $arr['created_at'] = $val->created_at;
                // $arr['updated_at'] = $val->updated_at;
                // $arr['modelName'] = "Student";
                // array_push($products, $arr);
            }
            return response()->json(['status' => 200, 'message' => 'Record Found', 'stu' => $array]);
        }
    }
    public function add_stu(Request $req)
    {
        $d = new Student();
        $d->name = $req->name;
        $d->age = $req->age;
        $d->city = $req->city;
        $d->save();
        $id = $d->id;
        $data = Student::find($id);
        return response()->json(['success' => 200, 'stu' => $data]);
    }
    public function delete(Request $req)
    {
        echo $req->id;
        echo $req->modelName;
    }
}
