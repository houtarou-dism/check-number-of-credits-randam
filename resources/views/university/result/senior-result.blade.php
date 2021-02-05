@extends('layouts.layout')

@section('content')
    <div class="modal fade result-dialog" id="confirmationScreen" tabindex="-1" role="dialog" aria-labelledby="confirmationScreenTitle" aria-hidden="true" style="display: none;">
        @include('university.result.dialog.senior-result-dialog')
    </div>
    <main class="d-flex justify-content-center result-main-position">
        <div class="result-content-position">
            <div class="content-header">
                <div class="d-flex justify-content-center">
                    @if($judePromotion === 'success')
                        <div class="text-center judgment-promotion-status-success">
                            <div class="d-inline-block">
                                <p class="mb-0 f-s-30">卒業可能</p>
                            </div>
                            <div class="d-inline-block">
                                <a id="confirmation-freshman-submit-button" class="d-inline-block text-center" role="button" data-toggle="modal" href="#confirmationScreen">
                                    <i class="fas fa-question-circle icon-color-purple i-s-18 popover-help-result"></i>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="text-center judgment-promotion-status-failure">
                            <div class="d-inline-block">
                                <p class="mb-0 f-s-30">卒業不可</p>
                            </div>
                            <div class="d-inline-block">
                                <a id="confirmation-freshman-submit-button" class="d-inline-block text-center" role="button" data-toggle="modal" href="#confirmationScreen">
                                    <i class="fas fa-question-circle icon-color-purple i-s-18 popover-help-result"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="point-text">
                    <p class="mb-0">{{ $totalCredits }} / 124 単位</p>
                </div>
            </div>
            <div class="content-center">
                <div class="pl-3 required-subject-header">
                    <div class="d-inline-block">
                        <p class="mb-0 f-s-25">必修落単</p>
                    </div>
                    <div class="d-inline-block">
                        <i class="fas fa-question-circle icon-color-purple i-s-15 popover-help-result-required"
                           tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                           data-container="body" data-placement="bottom" data-html="true"
                           data-content="必修落単とは、取得できていない必修科目のことです。">
                        </i>
                    </div>
                </div>
                <div class="d-flex justify-content-center required-subject-center">
                    <div class="required-subject-content text-left">
                        @foreach($notCompulsorySubjects as $notCompulsorySubject)
                            @foreach($notCompulsorySubject as $value)
                                <p class="mb-0">{{ $value }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="select-year-footer">
        <div class="text-center mt-3">
            <p><a class="copyright-text" href="https://github.com/houtarou-dism">© 2020 houtarou.</a></p>
        </div>
    </footer>
@endsection
