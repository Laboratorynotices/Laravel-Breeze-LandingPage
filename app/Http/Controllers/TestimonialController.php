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
	public function edit(Testimonial $testimonial)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Testimonial  $testimonial
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Testimonial $testimonial)
	{
		//
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
}
