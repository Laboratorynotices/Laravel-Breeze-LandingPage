<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Считываем все данные из таблицы "Сервисы".
        $services = Service::all();

        return view('service.index')
            // пересылаем переменные в вид
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('service.form');
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
        $input['image'] = $this->storeImage($request, 'image', 'services');

        // создаём новый объект модели услуг
        $service = new Service();

        // заполняем наш объект полученными данными
        $service->fill($input);

        // Сохраняем данные
        $service->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service) {
        return view('service.form')
            // пересылаем переменные в вид
            ->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request, true);

        // обновляем картинку, если она была загружена
        if ($request->hasFile('image')) {
            $input['image'] = $this->storeImage($request, 'image', 'services');
        }

        // заполняем наш объект полученными данными
        $service->fill($input);

        // Сохраняем данные
        $service->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service) {
        // Удаляем данные
        $service->delete();
     
        return redirect()->route('service.index');
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
            'sport'         => 'required|max:100',
            'image'         =>
                // При создании записи картинка обязательна, но не при обновлении.
                ((!$update) ?
                    'required|' :
                    '').
                'image',
            'description'   => 'required|max:150',
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
