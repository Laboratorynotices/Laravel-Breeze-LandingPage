<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioFilter;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Считываем все данные из таблицы "Portfolio".
        $portfolios = Portfolio::all();

        return view('portfolio.index')
            // пересылаем переменные в вид
            ->with('portfolios', $portfolios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('portfolio.form')
            // пересылаем переменные в вид
            ->with('portfolioFilters', PortfolioFilter::all());
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
        $input['image'] = $this->storeImage($request, 'portfolio', 'portfolio');

        // создаём новый объект модели услуг
        $portfolio = new Portfolio();

        // заполняем наш объект полученными данными
        $portfolio->fill($input);

        // Сохраняем данные
        $portfolio->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio) {
        return view('portfolio.form')
            // пересылаем переменные в вид
            ->with('portfolio', $portfolio)
            ->with('portfolioFilters', PortfolioFilter::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request, true);

        // обновляем картинку, если она была загружена
        if ($request->hasFile('image')) {
            $input['image'] = $this->storeImage($request, 'portfolio', 'about');
        }

        // заполняем наш объект полученными данными
        $portfolio->fill($input);

        // Сохраняем данные
        $portfolio->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio) {
        // Удаляем данные
        $portfolio->delete();
     
        return redirect()->route('portfolio.index');
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
            'image' =>
                // При создании записи картинка обязательна, но не при обновлении.
                ((!$update) ?
                    'required|' :
                    '').
                'image',
            'portfolio_filter_id' => 'required|numeric|integer',
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




