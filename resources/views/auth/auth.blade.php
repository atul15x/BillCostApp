@extends ('layout.layout') @section('content')
<div class="col-md-6 main">
    <h2 class="text-center">BillCostApp</h2>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session("message") }}
    </div>
    @endif @if($errors->any())
    <div class="alert alert-danger">
        <p>Please fillup all the details</p>
    </div>
    @endif
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button
                class="nav-link active"
                id="login-tab"
                data-bs-toggle="pill"
                data-bs-target="#login"
                type="button"
                role="tab"
                aria-controls="login"
                aria-selected="true"
            >
                Login
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
                class="nav-link"
                id="register-tab"
                data-bs-toggle="pill"
                data-bs-target="#register"
                type="button"
                role="tab"
                aria-controls="register"
                aria-selected="false"
            >
                Register
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div
            class="tab-pane fade show active"
            id="login"
            role="tabpanel"
            aria-labelledby="login-tab"
        >
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="post" action="/loginUser">
                        <!-- Login form fields here -->
                        @csrf
                        <div class="mb-3">
                            <label for="login-username" class="form-label"
                                >Email</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="login-username"
                                name="UserEmail"
                                placeholder="Enter your email"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label"
                                >Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="login-password"
                                name="UserPassoword"
                                placeholder="Enter your password"
                            />
                        </div>
                        <button type="submit" class="btn btn-success">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div
            class="tab-pane fade"
            id="register"
            role="tabpanel"
            aria-labelledby="register-tab"
        >
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="post" action="/regUser">
                        @csrf
                        <!-- Registration form fields here -->
                        <div class="mb-3">
                            <label for="register-name" class="form-label"
                                >Name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="register-name"
                                name="UserName"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="form-label"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="form-control"
                                id="register-email"
                                name="UserEmail"
                                placeholder="Enter your email"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="form-label"
                                >Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="register-password"
                                name="UserPassword"
                                placeholder="Enter a password"
                            />
                        </div>
                        <button type="submit" class="btn btn-success">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
