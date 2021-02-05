<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectYearRequest;


class CheckCreditController extends Controller
{
    public function index()
    {
        return view('university.top');
    }

    public function select_year(SelectYearRequest $request)
    {
        switch ($request['selectYear']){

            case 'freshman':
                return redirect(route('freshman.freshman'));
                break;

            case 'sophomore':
                return redirect(route('sophomore.freshman'));
                break;

            case 'junior':
                return redirect(route('junior.freshman'));
                break;

            case 'senior':
                return redirect(route('senior.freshman'));
                break;

            default:
                return abort(404);
        }
    }
}
