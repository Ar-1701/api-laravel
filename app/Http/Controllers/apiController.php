<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



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
                $data = [
                    'id' => $data->id,
                    'name' => $data->name,
                    'age' => $data->age,
                    'city' => $data->city,
                    'created_at' => $data->created_at,
                    'updated_at' => $data->updated_at,
                    'modelName' => "Student"
                ];
                return response()->json(['status' => 200, 'message' => 'Record Found', 'stu' => $data]);
            }
        } else {
            $data = Student::get();
            // $arr = [];            
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
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'age' => 'required|numeric',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $id = $req->id;
        $check = Student::find($id);
        if (isset($check)) {
            $check->name = $req->name;
            $check->age = $req->age;
            $check->city = $req->city;
            $check->save();
            $id = $check->id;
            $data = Student::find($id);
            return response()->json(['success' => 200, 'message' => 'Update Students Data', 'stu' => $data]);
        } else {
            $d = new Student();
            $d->name = $req->name;
            $d->age = $req->age;
            $d->city = $req->city;
            $d->save();
            $id = $d->id;
            $data = Student::find($id);
            return response()->json(['success' => 200, 'message' => 'Insert Data', 'stu' => $data]);
        }
    }
    public function delete(Request $req)
    {
        $id = $req->id;
        $model = "App\Models\\" . $req->modelName;
        if (class_exists($model)) {
            $modelName = App($model);
            $model = $modelName->find($id);
            if (isset($model)) {
                $model->delete();
                return response()->json(['status' => 200, 'message' => 'Delete Student Data']);
            } else {
                return response()->json(['status' => 404, 'message' => 'Student Data Not Existed']);
            }
        } else {
            return response()->json(['status' => 500, 'message' => 'Model Name Not Existed']);
        }
    }
}
