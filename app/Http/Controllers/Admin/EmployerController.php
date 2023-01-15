<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employer\EmployerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Repositories\Employer\EmployerRepository;

class EmployerController extends Controller
{
    protected $employerRepo;
    protected $request;

    public function __construct(EmployerRepository $employerRepo, Request $request) {
        $this->employerRepo = $employerRepo;
        $this->request = $request;
    }

    public function showEmployers()
    {
        return view('admin.employer.index');
    }

    public function tableJson(Request $request)
    {
        if ($request->ajax()) {
            $data =  User::whereHas('role', function ($query) {
                $query->where('name', 'employer');
            })->with('employer')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.employer.datatables_actions')
                ->make(true);
        }
    }

    public function viewEmployer(Request $request, $employer_id)
    {
        try {
            $data = $this->employerRepo->getEmployer($employer_id);
            return view('admin.employer.view', compact(['data']));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function editEmployer(Request $request, $employer_id)
    {
        try {
            $data = $this->employerRepo->getEmployer($employer_id);
            return view('admin.employer.edit', compact(['data']));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function updateEmployer(EmployerRequest $request, $employer_id)
    {
        try {
            $this->employerRepo->updateEmployer($request->validated(), $employer_id);
            return back()->with('success', 'Employer updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function addEmployer()
    {
        return view('admin.employer.add');
    }

    public function createEmployer(EmployerRequest $request)
    {
        try {
            $this->employerRepo->createEmployer($request->validated());
            return back()->with('success', 'Employer created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteEmployer($employer_id)
    {
        try {
            $this->employerRepo->deleteEmployer($employer_id);
            return back()->with('success', 'Employer deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error',  $e->getMessage());
        }
    }
}
