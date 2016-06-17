<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;

class Employees extends Controller
{
    /**
     * index
     * @param  int $id Id of an employee
     * @return Array    Array representation of an employee
     */
    public function index($id=null)
    {
      if ($id) {
        return $this->show($id);
      }

      return Employee::orderBy("id", "asc")->get();
    }

    /**
     * destroy
     * @param  Request $request data sended
     * @return boolean Flag to indicate that all is good
     */
    public function destroy($id)
    {
      $employee = Employee::find($id);

      $employee->delete();

      return response()->json(["error" => 'false'], 200);
    }

    /**
     * update
     * @param  Request $request data sended
     * @param  Int $id Id of an employee
     * @return boolean  true flag to indicate that all is good
     */
    public function update(Request $request, $id)
    {
      $employee = Employee::find($id);
      $employee->name = $request->input("name");
      $employee->email = $request->input("email");
      $employee->contact_number = $request->input("contact_number");
      $employee->position = $request->input("position");

      $employee->save();

      return response()->json(["error" => 'false'], 200);
    }

    /**
     * show
     * @param  int $id Id of an employee
     * @return Array   Array representation of an employee
     */
    public function show($id)
    {
      return Employee::find($id);
    }

    /**
     * store
     * @param  Request $request data sended
     * @return boolean  true flag to indicate that all is good
     */
    public function store(Request $request)
    {
      $employee = new Employee;
      $employee->name = $request->input("name");
      $employee->email = $request->input("email");
      $employee->contact_number = $request->input("contact_number");
      $employee->position = $request->input("position");

      $employee->save();

      return response()->json(["error" => 'false'], 200);
    }
}
