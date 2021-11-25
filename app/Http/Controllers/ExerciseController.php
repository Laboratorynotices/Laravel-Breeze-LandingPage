<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
        // Считываем все данные из таблицы "Занятий".
        $exercises = Exercise::all();

        return view('exercise.index')
            // пересылаем переменные в вид
            ->with('exercises', $exercises);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
        return view('exercise.form');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request);

        // создаём новый объект модели услуг
        $exercise = new Exercise();

        // заполняем наш объект полученными данными
        $exercise->fill($input);

        // Сохраняем данные
        $exercise->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('exercise.index');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Exercise  $exercise
	 * @return \Illuminate\Http\Response
	 */
	public function show(Exercise $exercise)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Exercise  $exercise
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Exercise $exercise) {
        return view('exercise.form')
            // пересылаем переменные в вид
            ->with('exercise', $exercise);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Exercise  $exercise
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Exercise $exercise) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request);

        // Обновляем данные модели, которые определили как "fillable"
        $exercise->fill($input);

        // Сохраняем данные
        $exercise->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('exercise.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Exercise  $exercise
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Exercise $exercise) {
        // Удаляем данные
        $exercise->delete();

        // @TODO обработка, если удаление данных не получится

        return redirect()->route('exercise.index');
    }


    /**
     * Валидация данных, которые получаем от формы
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array()
     */
    private function getValidatedData(Request $request) {
        return $request->validate([
            'time'			=> 'required|max:50',
            'class'			=> 'required|max:100',
            'description'	=> 'required|max:100',
            'price'			=> 'required|max:9999|numeric|integer',
        ]);
    }
}
