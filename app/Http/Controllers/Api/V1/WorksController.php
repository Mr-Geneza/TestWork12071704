<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorksController extends Controller
{
	public function index()
	{
		return Work::all();
	}

	public function show($id)
	{
		return Work::findOrFail($id);
	}

	public function update(Request $request, $id)
	{
		$company = Work::findOrFail($id);
		$company->update($request->all());

		return $company;
	}

	public function store(Request $request)
	{
		$company = Work::create($request->all());
		return $company;
	}

	public function destroy($id)
	{
		$company = Work::findOrFail($id);
		$company->delete();
		return '';
	}
}
