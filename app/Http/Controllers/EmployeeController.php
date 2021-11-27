<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Считываем все данные из таблицы "Employees".
        $employees = Employee::all();

        return view('employee.index')
            // пересылаем переменные в вид
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('employee.form');
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
        $input['image'] = $this->storeImage($request, 'image', 'team');

        // создаём новый объект модели услуг
        $employee = new Employee();

        // заполняем наш объект полученными данными
        $employee->fill($input);

        // Сохраняем данные
        $employee->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee) {
        return view('employee.form')
            // пересылаем переменные в вид
            ->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee) {
        // Получаем входящие данные, которые пройдут валидацию.
        $input = $this->getValidatedData($request, true);

        // обновляем картинку, если она была загружена
        if ($request->hasFile('image')) {
            $input['image'] = $this->storeImage($request, 'image', 'team');
        }

        // заполняем наш объект полученными данными
        $employee->fill($input);

        // Сохраняем данные
        $employee->save();

        // @TODO обработка, если запись данных не получится

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee) {
        // Удаляем данные
        $employee->delete();
     
        return redirect()->route('employee.index');
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
            'name'      => 'required|max:100',
            'image'     =>
                // При создании записи картинка обязательна, но не при обновлении.
                ((!$update) ?
                    'required|' :
                    '').
                'image',
            'position'  => 'required|max:100',
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
