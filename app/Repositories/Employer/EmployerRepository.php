<?php

namespace App\Repositories\Employer;

use App\Models\Employer\Employer;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployerRepository
{
    public function getEmployers()
    {
        return Employer::all();
    }

    public function getEmployer($userId)
    {
        return User::where([['id', '=', $userId]])->with('employer')->first();
    }

    public function createEmployer($data)
    {
        $user = User::create([
            'role_id' => Role::where('name', '=', 'employer')->pluck('id')->first(),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $employer = new Employer;
        $employer->user_id = $user->id;
        $employer->fill($data);
        $employer->save();
    }

    public function updateEmployer(array $data, int $userId): void
    {
        $user = User::where('id', $userId)
            ->with('employer')
            ->first();

        if (!$user) {
            throw new \Exception('User not found');
        }

        $employer = $user->employer;

        $user->update([
            'role_id' => Role::where('name', 'employer')->value('id'),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'updated_at' => Carbon::now(),
        ]);

        $employer->update($data);
    }


    public function deleteEmployer($userId)
    {
        $user = User::where([['id', '=', $userId]])->with('employer')->first();
        $user->employer->delete();
        $user->delete();
    }

    public function tableJson(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'first_name',
            2 => 'last_name',
            3 => 'email',
        ];
        $limit = $request->input('length');
        $start = $request->input('start');

        $order = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');
        $search = isset($search) ? $search : "";

        $totalData = User::whereHas('role', function ($query) {
            $query->where('name', 'employer');
        })->count();

        $data = User::whereHas('role', function ($query) {
            $query->where('name', 'employer');
        })->with('employer')
            ->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })->orderBy($columns[$order], $dir)
            ->offset($start)
            ->limit($limit)
            ->get();

        $totalFiltered  = User::whereHas('role', function ($query) {
            $query->where('name', 'employer');
        })->with('employer')
            ->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })->count();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'admin.employer.datatables_actions')
            ->with(['recordsTotal' => $totalData, 'recordsFiltered' => $totalFiltered, 'draw' => $request->input('draw')])
            ->make(true);
    }
}
