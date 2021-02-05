@extends('random.layout')

@section('content')
    <main class="main-container h-100">
        <div class="random-content-container">
            <div class="random-content-header">
                <h1 class="text-center mb-0">ルーレット</h1>
            </div>
            <div class="random-content-body">
                <div class="d-flex justify-content-center align-items-center result-main-position f-s-28 select-name">
                    <div id="select-name" class="text-center">
                        <p class="mb-0">ここに<br>表示されます</p>
                    </div>
                </div>
                <div class="text-right mt-2 reset-count">
                    <div class="d-inline-block">リセットカウント：</div>
                    <div id="reset-count" class="d-inline-block">10</div>
                </div>
                <button type="button" id="submit-btn" class="btn auth-btn">スタート</button>
            </div>
        </div>
    </main>
@endsection
