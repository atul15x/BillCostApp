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
                        <li><a class="dropdown-item" href="#">Home</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('search') }}">Search</a></li>
                        <li><a class="dropdown-item" href="#">Add Categories</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light">Logout <i class="bi bi-box-arrow-left"></i></button>
                            </form>    
                        </a></li>
                        
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <form action="/searchCost" method="post">
        @csrf
        <div class="container mt-5">
            <div class="input-group mb-3">
                <label class="input-group-text" for="monthSelect">Select Month</label>
                <select name="month" class="form-select" id="monthSelect">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="optionSelect">Select Categories</label>
                <select name="cate" class="form-select" id="optionSelect">
                <option value="All">All</option>
                    @foreach( $cost_categories as $optionValue)
                        <option  style="color: #a2a2a2" value="{{ $optionValue->id }}">{{ $optionValue->categories_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-success" type="button" id="searchButton">Search</button>
            </div>
        </div>
    </form>

    @if ($resultsShow)
     <hr>
    @foreach ($results as $data)
        <div style="border:2px solid black; margin: 1% 0;padding:5px" class="row justify-content-between align-items-center">
            <div class="col-md-auto ">
                <div class="d-flex justify-content-between align-items-center"> 
                    {{-- <h4 class="" style="color: #a2a2a2">{{$data->cost_categories->categories_name}}</h4> --}}
                    <h6 class="" style="color: #a2a2a2">Cost: {{$data->total_cost}}</h6>
                </div>
            </div>
            <div class="col-md-auto  mt-2 mt-md-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span style="color: #a2a2a2">{{$data->cost_expense_date}}</span>
                    <form style="display: inline-flex" action="/deleteCost{{$data->id}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light"><i style="color: #a2a2a2" class="bi bi-trash3"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <hr>
    <div class="col-md-auto  mt-2 mt-md-0">
        <div class="d-flex justify-content-between align-items-center">
            <span style="color: #a2a2a2">Total Cost</span>
            <span style="color: #a2a2a2">{{$totalCostSum}}</span>
        </div>
    </div>

    @endif

     {{-- tryagain3--}}

@endsection
