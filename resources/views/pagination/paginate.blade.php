
    <form id="paginate-form" action="{{ route('admins.'.$controller.'.index') }}">
        <input type='hidden' value="{{$search}}" placeholder="" aria-controls="" name="search">
        <div class="dataTables_length" id="DataTables_Table_0_length">
            <label>{{ __('pagination.show_results')}}
                <select id="rows-select" name="rows" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm" style="width: 75px; display: inline-block;">
                    <option value="10" @if(isset($rows) && $rows == 10) selected @endif>10</option>
                    <option value="25" @if(isset($rows) && $rows == 25) selected @endif>25</option>
                    <option value="50" @if(isset($rows) &&  $rows == 50) selected @endif>50</option>
                    <option value="100" @if(isset($rows) &&  $rows == 100) selected @endif>100</option>
                </select>
            </label>
        </div>
    </form>
