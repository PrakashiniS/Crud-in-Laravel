<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Data;

class userController extends Controller
{
    public function indi(){
        $data=  Data::all();
        return view('index',compact('data'));
    }
    public function basics(Request $req){
        try{
            $req-> validate([
                'name'=>'required',
                'dept'=>'required'
            ]);
            Data::create($req->all());
            return response() ->json([
                'status'=>200,
                'message'=>'user added successfully'
            ]);

        }catch (\Exception $e){
            return response() ->json([
                'status'=> 500,
                'message'=>'something went wrong'
            ]);
        }

    }
    public function des($id)
    {
        try {
            $user = Data::findOrFail($id);
            $user->delete();

            return response()->json([
                'status' => 200,
                'message' => 'User deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
    public function editu($id)
    {
        try {
            $user = Data::findOrFail($id);


            return response()->json([
                'status' => 200,
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'dept' => $user->dept]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'User not found'
            ]);
        }
    }
    public function editnew( Request $req ,$id){
        try{
            $user = Data::findorFail($id);
            $user ->update($req->all());
            return response()->json([
                'status'=>200,
                'message'=>'edited successfully'
            ]);

        }catch (\Exception $e){
            return response()-> json([
                'status'=>500,
                'message'=>'something went worng'
            ]);
        }
    }
}
