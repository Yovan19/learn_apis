<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function singleStudent($id){
        try {

            // Create a new student record
            $student = Student::where('id', $id)->whereNull('deleted_at')->get()->toArray();
            if(empty($student)){
                $response = [
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'Student Not found.',
                ];

                return $response;
            }

            // Prepare the success response
            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Student Listing',
                'data' => [
                    'student' => $student,
                ],
            ];
        } catch (\Exception $e) {
            // Prepare the error response
            $response = [
                'status' => 'error',
                'code' => 401,
                'message' => 'Something went wrong.',
            ];
        }

        return response()->json($response, $response['code']);
    }

    public function listStudent(){
        try {

            // Create a new student record
            $student = Student::whereNull('deleted_at')->get()->toArray();
            if(empty($student)){
                $response = [
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'Student Not found.',
                ];

                return $response;
            }

            // Prepare the success response
            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'All Students Listing',
                'data' => [
                    'student' => $student,
                ],
            ];
        } catch (\Exception $e) {
            // Prepare the error response
            $response = [
                'status' => 'error',
                'code' => 401,
                'message' => 'Something went wrong.',
            ];
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Use Laravel's Validator to validate the incoming data
        $validator = Validator::make($request->all(),
            [
                'first_name' => 'required|string|max:15',
                'last_name' => 'required|string|max:15',
                'email' => 'required|email|unique:students|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|in:Male,Female,Non-binary',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
            ]
        );

        if ($validator->fails()) {
            // Validation failed; return error response
            return response()->json([
                'status' => 'error',
                'code' => 401,
                'message' => 'Something went wrong.',
                'errors' => $validator->errors(),
            ], 401);
        }

        try {

            // Create a new student record
            $student = new Student([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]);

            // Save the student record to the database
            $student->save();

            // Prepare the success response
            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Student Registered Successfully',
                'data' => [
                    'student' => $student,
                ],
            ];
        } catch (\Exception $e) {
            // Prepare the error response
            $response = [
                'status' => 'error',
                'code' => 401,
                'message' => 'Something went wrong.',
            ];
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Use Laravel's Validator to validate the incoming data
        $validator = Validator::make($request->all(),
            [
                'first_name' => 'required|string|max:15',
                'last_name' => 'required|string|max:15',
                // 'email' => 'required|email|unique:students|max:255',
                'email' => 'required|email|max:255|unique:students,email,' . $id,
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|in:Male,Female,Non-binary',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
            ]
        );

        if ($validator->fails()) {
            // Validation failed; return error response
            return response()->json([
                'status' => 'error',
                'code' => 401,
                'message' => 'Something went wrong.',
                'errors' => $validator->errors(),
            ], 401);
        }

        try {

            // Update a student record

            $student = Student::find($id);
            if ($student) {
                $student->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                ]);
            }else{
                $return =  [
                    'status' => 'error',
                    'code' => 401,
                    'message' => 'Student recode not found.',
                ];
            }

            // Prepare the success response
            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Student Updated Successfully',
                'data' => [
                    'student' => $student,
                ],
            ];
        } catch (\Exception $e) {
            // Prepare the error response
            $response = [
                'status' => 'error',
                'code' => 401,
                'message' => 'Something went wrong.',
            ];
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            // Handle the case where the student with the given ID was not found
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'message' => 'Student not found.',
            ], 404);
        }

        try {
            $student->delete();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Student deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            // Handle any database errors or exceptions
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Failed to delete the student.',
            ], 500);
        }
    }
}
