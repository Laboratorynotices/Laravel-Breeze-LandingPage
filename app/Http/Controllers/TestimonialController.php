<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
        // Считываем все данные из таблицы "testimonials".
        $testimonials = Testimonial::all();

        return view('testimonial.index')
            // пересылаем переменные в вид
            ->with('testimonials', $testimonials);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
        return view('testimonial.form');
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

        // Сохраняем загруженную картинку
        $input['image'] = $this->storeImage($request, 'image', 'ava');

        // создаём новый объект модели услуг
        $testimonial = new Testimonial();

        // заполняем наш объект полученными данными
        $testimonial->fill($input);

        // Сохраняем данные
        $testimonial->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('testimonial.index');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Testimonial  $testimonial
	 * @return \Illuminate\Http\Response
	 */
	public function show(Testimonial $testimonial)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Testimonial  $testimonial
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Testimonial $testimonial) {
        return view('testimonial.form')
            // пересылаем переменные в вид
            ->with('testimonial', $testimonial);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Testimonial  $testimonial
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Testimonial $testimonial) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request, true);

        // обновляем картинку, если она была загружена
        if ($request->hasFile('image')) {
            $input['image'] = $this->storeImage($request, 'image', 'ava');
        }

        // заполняем наш объект полученными данными
        $testimonial->fill($input);

        // Сохраняем данные
        $testimonial->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('testimonial.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Testimonials  $testimonials
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Testimonial $testimonial) {
        // Удаляем данные
        $testimonial->delete();
     
        return redirect()->route('testimonial.index');
    }


    /**
     * Валидация данных, которые получаем от формы
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool $update - определяет из какого метода вызывается этот метод.
     * @return array()
     */
    private function getValidatedData(Request $request, bool $update = false) {
        // @TODO Валидация id???
        return $request->validate([
            'name'          => 'required|max:100',
            'position'	 	=> 'required|max:100',
            'image'         =>
                // При создании записи картинка обязательна, но не при обновлении.
                ((!$update) ?
                    'required|' :
                    '').
                'image',
            'text'          => 'required|max:999',
        ]);
    }


    /**
     * Сохраняет картинку, загруженную через форму.
     * Возвращает оригинальное название загруженного файла.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $fieldName - имя поля, через который загружается файл
     * @param  String $folderName - имя папки, в которую загружается файл
     * @return String - оригинальное название загруженного файла.
     */
    private function storeImage(Request $request, String $fieldName, String $folderName = '') {
        // обновляем картинку, если она была загружена
        if ($request->hasFile($fieldName)) {
            // запоминаем оригинальное название файла
            $originalName = $request->file($fieldName)->getClientOriginalName();
            // сохраняем загруженный файл в папку $folderName с оригинальным названием
            $request->file($fieldName)->storePubliclyAs($folderName, $originalName);
            // готовим название файла к заполнению в модель.
            return $originalName;
        }

        return '';
    }
}
