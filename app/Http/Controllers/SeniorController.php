<?php

namespace App\Http\Controllers;


use App;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Traits\Jsonable;
use App\Traits\Verifiable;
use App\Traits\Obtainable;
use App\Traits\Convertible;
use App\Http\Requests\CheckFormRequest;


class SeniorController extends Controller
{
    use Jsonable, Verifiable, Obtainable, Convertible;

    public function freshman()
    {
        if (App::environment('local')){
            return url()->previous() === 'https://credit-check-sagara.test/' ? view('university.senior.senior-freshman') : abort(404);
        }

        return url()->previous() === 'https://credit-check.coposa.work/' ? view('university.senior.senior-freshman') : abort(404);
    }

    public function sophomore()
    {
        if (App::environment('local')){
            return url()->previous() === 'https://credit-check-sagara.test/select_year/senior/1' ? view('university.senior.senior-sophomore') : abort(404);
        }

        return url()->previous() === 'https://credit-check.coposa.work/select_year/senior/1' ? view('university.senior.senior-sophomore') : abort(404);
    }

    public function junior()
    {
        if (App::environment('local')){
            return url()->previous() === 'https://credit-check-sagara.test/select_year/senior/2' ? view('university.senior.senior-junior') : abort(404);
        }

        return url()->previous() === 'https://credit-check.coposa.work/select_year/senior/2' ? view('university.senior.senior-junior') : abort(404);
    }

    public function senior()
    {
        if (App::environment('local')){
            return url()->previous() === 'https://credit-check-sagara.test/select_year/senior/3' ? view('university.senior.senior-senior') : abort(404);
        }

        return url()->previous() === 'https://credit-check.coposa.work/select_year/senior/3' ? view('university.senior.senior-senior') : abort(404);
    }

    /**
     * @param CheckFormRequest $request
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
    public function check(CheckFormRequest $request)
    {
        $json = $this->fromJson($request->data);

        if( !(Arr::has($json, 'data.freshman') && Arr::has($json, 'data.sophomore')
            && Arr::has($json, 'data.junior') && Arr::has($json, 'data.senior')))
        {
            return redirect(route('index'))->with('message', '不正な操作が行われました。');
        }

        $this->getSelectData($json);

        //必修科目だが、取得できていない科目一覧
        $notCompulsorySubjects = $this->getRequiredAll($this->requiredFreshman(), $this->requiredSophomore(), $this->requiredJunior(), $this->requiredSenior());

        //合計修得単位数
        $totalCredits = $this->getSpecialTotalCredits();

        //進級条件を満たしているか
        $judePromotion = $this->getJudePromotionSenior();

        return view('university.result.senior-result', compact('notCompulsorySubjects', 'totalCredits', 'judePromotion'));
    }
}
