<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Todo::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$data = new Todo();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = new Todo();
		$data->title = $request->title;
		$data->description = $request->description;
		$data->save();

		return response($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function show(Todo $todo)
	{
		return $todo;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Todo $todo)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Todo $todo)
	{
		$todo->title = $request->title;
		$todo->description = $request->description;
		$todo->save();
		return response($todo);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Todo  $todo
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Todo $todo)
	{
		return $todo->delete();
	}
}
