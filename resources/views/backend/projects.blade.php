@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header bg-dark">
                        <strong class="card-title text-white">Add New Project</strong>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('save.project') }}" novalidate>
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title">Project Title</label>
                                <input type="text" placeholder="Enter Project Title" class="form-control" name="title" id="title" required>
                                <div class="invalid-feedback">Please enter a project title.</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Describe your project here..." required></textarea>
                                <div class="invalid-feedback">Please provide a project description.</div>
                            </div>

                            <!-- Start and End Date Fields -->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                    <div class="invalid-feedback">Please select a start date.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                    <div class="invalid-feedback">Please select an end date.</div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link">Project Link</label>
                                <input type="url" name="link" id="link" class="form-control" placeholder="Enter Project Link" required>
                                <div class="invalid-feedback">Please enter a valid URL for the project.</div>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-success btn-block" type="submit">Save Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
