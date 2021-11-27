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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(PortfolioFilter $portfolioFilter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioFilter  $portfolioFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioFilter $portfolioFilter)
    {
        //
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

        return redirect()->route('portfolioFilter.index');
    }
}
