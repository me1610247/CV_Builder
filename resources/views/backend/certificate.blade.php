@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header bg-dark">
                        <strong class="card-title text-white">Add Certificate </strong>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('save.certificate') }}" novalidate>
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" placeholder="Enter Certificate Title" class="form-control" name="title" id="title" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Describe your certificate  here..." required></textarea>
                            </div>

                            <!-- Start and End Date Fields -->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link">Company Name (optional)</label>
                                <input type="text" name="company" id="company" class="form-control" placeholder="Enter The Company Name" required>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-success btn-block" type="submit">Save Job</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
