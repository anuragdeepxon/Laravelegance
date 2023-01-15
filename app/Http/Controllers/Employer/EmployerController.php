<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employer\EmployerRequest;
use App\Models\Employer\Employer;
use App\Repositories\Employer\EmployerRepository;

class EmployerController extends Controller
{
 protected $repository;

 public function __construct(Employer $employer)
 {
     $this->repository = new EmployerRepository($employer);
 }

 public function index()
 {
     return $this->repository->all();
 }

 public function store(EmployerRequest $request)
 {
     $this->repository->create($request->only($this->repository->getModel()->fillable));

     return response()->json(['success' => true]);
 }

 public function show($id)
 {
     return $this->repository->show($id);
 }

 public function update(EmployerRequest $request, $id)
 {
     $this->repository->update($request->only($this->repository->getModel()->fillable), $id);

     return response()->json(['success' => true]);
 }

 public function destroy($id)
 {
     $this->repository->delete($id);

     return response()->json(['success' => true]);
 }


}
