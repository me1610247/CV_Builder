@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Experience Details</strong>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('update.experience') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{$exps->id}}" id="">
                            <div class="form-group mb-3">
                                <label for="country">Title</label>
                                <input type="text" class="form-control" value="{{$exps->title}}" placeholder="Enter Your Job Title" name="title" id="title">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Describe your Experience here..." required>{{ $exps->description }}</textarea>
                            </div>
                            <!-- Start and End Date Fields -->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" value="{{$exps->start_date}}" name="start_date" id="start_date" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_date">End Date</label>
                                    <input type="date" value="{{$exps->end_date}}" name="end_date" id="end_date" class="form-control" required>
                                </div>
                            </div>

                            <!-- Degree/Field of Study Field -->
                            <div class="form-group mb-3">
                                <label for="link">Company (Optional)</label>
                                <input type="text" name="company" value="{{$exps->link}}" id="company" class="form-control" placeholder="e.g., Valeo" required>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-success text-dark col-md-2" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

