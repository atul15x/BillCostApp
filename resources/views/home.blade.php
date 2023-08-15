@extends ('layout.layout')

@section('content')
<div class="col-md-6 main">
    <h2 class="text-center">BillCostApp</h2>
    <div>
       <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <h5 class="">Hi {{$user->UserName}}</h5>
            </div>
            <div class="col-auto">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <h4>Today Cost</h4>
        </div>
        <div class="col-auto">
            <span id="current-fullday" style="color: #a2a2a2"></span>
            <span id="current-day" style="color: #a2a2a2"></span>
        </div>
        <div>
            <h5>{{$t_cost}} &#xA5</h5>
        </div>
    </div>
    <hr>

    @if(session('Cost_deleted_success'))
        <div class="alert alert-success">
            {{ session("Cost_deleted_success") }}
        </div>
    @endif

    @foreach ($matchingDate_CostView as $data)
    <div style="border:2px solid black; margin: 1% 0;padding:5px" class="row justify-content-between align-items-center">
        <div class="col-auto">
            <h4 style="color: #a2a2a2">{{$data->cost_categories->categories_name}}</h4>
            <h6 style="color: #a2a2a2">Cost: {{$data->total_cost}}</h6>
        </div>
        <div class="col-auto">
            <span style="color: #a2a2a2">{{$data->cost_expense_date}}</span>
            <form style="display: inline-flex" action="/deleteCost{{$data->id}}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light"><i style="color: #a2a2a2" class="bi bi-trash3"></i></button>
            </form>
        </div>
    </div>
    @endforeach

    <div class="row mt-5">
        <h3>Add Cost</h3>
        <br>
        <br>
            <div class="col">
                <form method="POST" action="/addCost" >
                    @csrf
                    <div class="input-group mb-3">
                        <label style="color: #a2a2a2" class="input-group-text" for="selectOption">Cost Categories</label>
                        <select class="form-control" id="selectOption" name="cost_categories_id">
                            @foreach( $cost_categories as $optionValue)
                                <option  style="color: #a2a2a2" value="{{ $optionValue->id }}">{{ $optionValue->categories_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label style="color: #a2a2a2" class="input-group-text" for="current-fullday">Date</label>
                        <input name="cost_expense_date" type="date" class="form-control" id="current-fullday" name="shortDescription" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="input-group mb-3">
                        <label style="color: #a2a2a2" class="input-group-text" for="totalCost">Cost</label>
                        <input name="total_cost" type="number" class="form-control" id="totalCost" name="totalCost">
                    </div>
                    <button type="submit" class="btn btn-success">Add Cost</button>
                </form>
            </div>
        </div>

     {{-- tryagain --}}
@endsection
