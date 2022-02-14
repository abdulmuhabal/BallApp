<form action="{{ route('admins.'.$controller.'.index') }}" method="get">
<div id="DataTables_Table_0_filter" class="float-left">
<label style="font-weight: normal; white-space: nowrap; text-align: left;">
<div class="input-group mb-3">
  <input type="search" class="form-control form-control-sm button-right-append-rtl" name="search" value="{{$search}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append ">
    <button class="btn btn-outline-primary button-left-append-rtl" type="submit">{{__('pagination.search')}}</button>
  </div>
</div>
<!-- <input type="search" value="{{$search}}" placeholder="" aria-controls="" name="search" class="form-control form-control-sm" style="margin-left: 0.5em;display: inline-block; width: auto;"> -->
</label>

</div>
</form>