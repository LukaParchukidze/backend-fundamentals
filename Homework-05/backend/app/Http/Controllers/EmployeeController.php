<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use App\Notifications\EmployeeHired;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();

        return view('employees/employee_list', ['employees' => $employees]);
    }

    public function edit(Employee $employee) {
        return view('employees/edit', ['employee' => $employee]);
    }

    public function update(EditEmployeeRequest $request, Employee $employee) {
        $employee->update($request->all());

        return redirect()->route('employees');
    }

    public function switchHired(Employee $employee) {
        $isHired = !$employee->is_hired;

        $employee->update([
            $employee->is_hired = $isHired,
        ]);

        if ($isHired) {
            $details = [
                'greeting' => 'hi Artisan',
                'body' => 'This is our example notification tutorial',
                'thanks' => 'Thank you for visiting codechief.org!',
            ];

            $user = User::query()->firstOr(function () { User::factory(1)->create(); });
            $user->notify(new EmployeeHired($details));
        }

        return response((int) $isHired, 200);
    }
}
