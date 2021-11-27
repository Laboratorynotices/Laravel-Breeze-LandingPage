<?php

namespace App\Http\Controllers;

use App\Models\PortfolioFilter;
use Illuminate\Http\Request;

class PortfolioFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Считываем все данные из таблицы "Занятий".
        $portfolioFilters = PortfolioFilter::all();

        return view('portfolioFilter.index')
            // пересылаем переменные в вид
            ->with('portfolioFilters', $portfolioFilters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('portfolioFilter.form');
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
        $portfolioFilter = new PortfolioFilter();

        // заполняем наш объект полученными данными
        $portfolioFilter->fill($input);

        // Сохраняем данные
        $portfolioFilter->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('portfolio.filter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioFilter  $portfolioFilter
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioFilter $portfolioFilter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioFilter  $portfolioFilter
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioFilter $portfolioFilter) {
        return view('portfolioFilter.form')
            // пересылаем переменные в вид
            ->with('portfolioFilter', $portfolioFilter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioFilter  $portfolioFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioFilter $portfolioFilter) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request, true);

        // заполняем наш объект полученными данными
        $portfolioFilter->fill($input);

        // Сохраняем данные
        $portfolioFilter->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('portfolio.filter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioFilter  $portfolioFilter
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioFilter $portfolioFilter) {
        // Удаляем данные
        $portfolioFilter->delete();

        // @TODO обработка, если удаление данных не получится

        return redirect()->route('portfolio.filter.index');
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
            'full_name'     => 'required|max:100',
            'short_name'	=> 'required|max:100',
        ]);
    }
}
