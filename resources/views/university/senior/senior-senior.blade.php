@extends('layouts.layout')

@section('content')
    <div class="modal fade" id="confirmationScreen" tabindex="-1" role="dialog" aria-labelledby="confirmationScreenTitle" aria-hidden="true" style="display: none;">
        @include('dialog.senior-check-dialog')
    </div>
    <main class="year-position">
        <div class="text-center year-header">
            <p class="d-inline-block mb-0 f-s-30">大学４年次</p>
            <div class="d-inline-block dialog-popover">
                <i class="fas fa-question-circle icon-color-purple ml-2 i-s-20 popover-help"
                   tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                   data-container="body" data-placement="bottom" data-html="true"
                   data-content="単位を取得した科目にチェックを付けてください">
                </i>
            </div>
        </div>
        @include('university.select.senior')
        <div class="text-right submit-btn-position">
            <div class="d-inline-block submit-btn-size">
                <a id="confirmation-senior-submit-button" class="d-inline-block text-center submit-btn" role="button" data-toggle="modal" href="#confirmationScreen">
                    送信
                </a>
            </div>
        </div>
    </main>
@endsection
