
<div class="input-group col-md-3">
    <input autocomplete="off" value="{{ request('start_date') }}" name="start_date" type="text" class="form-control"
           id="datepicker-autoclose" placeholder="dd/mm/yyyy" required>
    <div class="input-group-append">
        <span class="input-group-text"><i class="icon-calender"></i></span>
    </div>
</div>
<div class="input-group col-md-3">
    <input autocomplete="off" value="{{ request('end_date') }}" name="end_date" type="text" class="form-control"
           id="datepicker-autoclose1" placeholder="dd/mm/yyyy" required>
    <div class="input-group-append">
        <span class="input-group-text"><i class="icon-calender"></i></span>
    </div>
</div>
