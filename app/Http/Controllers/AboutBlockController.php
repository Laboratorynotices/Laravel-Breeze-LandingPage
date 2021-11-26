<?php

namespace App\Http\Controllers;

use App\Models\AboutBlock;
use Illuminate\Http\Request;

class AboutBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Считываем все данные из таблицы "AboutBlock".
        $aboutBlocks = AboutBlock::all();

        return view('aboutBlock.index')
            // пересылаем переменные в вид
            ->with('aboutBlocks', $aboutBlocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('aboutBlock.form');
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
        $input['image'] = $this->storeImage($request, 'image', 'about');

        // создаём новый объект модели услуг
        $aboutBlock = new AboutBlock();

        // заполняем наш объект полученными данными
        $aboutBlock->fill($input);

        // Сохраняем данные
        $aboutBlock->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('aboutBlock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutBlock  $aboutBlock
     * @return \Illuminate\Http\Response
     */
    public function show(AboutBlock $aboutBlock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutBlock  $aboutBlock
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutBlock $aboutBlock) {
        return view('aboutBlock.form')
            // пересылаем переменные в вид
            ->with('aboutBlock', $aboutBlock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutBlock  $aboutBlock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutBlock $aboutBlock) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request, true);

        // обновляем картинку, если она была загружена
        if ($request->hasFile('image')) {
            $input['image'] = $this->storeImage($request, 'image', 'about');
        }

        // заполняем наш объект полученными данными
        $aboutBlock->fill($input);

        // Сохраняем данные
        $aboutBlock->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('aboutBlock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutBlock  $aboutBlock
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutBlock $aboutBlock) {
        // Удаляем данные
        $aboutBlock->delete();
     
        return redirect()->route('aboutBlock.index');
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
            'title'         => 'required|max:100',
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
