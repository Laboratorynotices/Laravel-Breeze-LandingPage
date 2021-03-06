<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Считываем все данные из таблицы "Услуги".
        $amenities = Amenity::all();

        return view('amenity.index')
            // пересылаем переменные в вид
            ->with('amenities', $amenities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('amenity.form');
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
        $amenity = new Amenity();

        // заполняем наш объект полученными данными
        $amenity->fill($input);

        // Сохраняем данные
        $amenity->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('amenity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity) {
        return view('amenity.form')
            // пересылаем переменные в вид
            ->with('amenity', $amenity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenity $amenity) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request);

        // Обновляем данные модели, которые определили как "fillable"
        $amenity->fill($input);

        // Сохраняем данные
        $amenity->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity) {
        // Удаляем данные
        $amenity->delete();

        // @TODO обработка, если удаление данных не получится

        return redirect()->route('amenity.index');
    }


    /**
     * Валидация данных, которые получаем от формы
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array()
     */
    private function getValidatedData(Request $request) {
        // @TODO Валидация id???
        return $request->validate([
            'title'         => 'required|max:50',
            'icon'          => 'required|max:50',
            'description'   => 'required|max:999',
        ]);
    }
}
