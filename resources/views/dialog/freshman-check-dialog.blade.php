<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-center">
        <div class="dialog-header">
            <h4 class="mb-0">単位取得数チェック</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('freshman.check') }}" method="POST">
                @csrf
                <input type="hidden" id="check-form-freshman" name="data" value="">
                <button type="submit" id="check-submit-btn" class="btn py-3 check-submit-btn">チェックする</button>
            </form>
        </div>
    </div>
</div>
