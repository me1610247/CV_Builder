@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Education Details</strong>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('update.edu') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{$edu->id}}" id="">
                            <div class="form-group mb-3">
                                <label for="country">Country</label>
                                <select id="country" name="country" class="form-control" required>
                                    <option value="{{ $edu->country }}">{{ $edu->country }}</option> <!-- Add value attribute -->
                                    <!-- Dynamic country options here -->
                                </select>
                            </div>

                            <!-- University/School Name Field -->
                            <div class="form-group mb-3">
                                <label for="university">University/School</label>
                                <select id="university" name="university" class="form-control" required>
                                    <option value="{{$edu->university}}">{{$edu->university}}</option>
                                    <!-- Dynamic options will be populated here if API is used -->
                                </select>
                            </div>


                            <!-- Start and End Date Fields -->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" value="{{$edu->start_date}}" name="start_date" id="start_date" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_date">End Date</label>
                                    <input type="date" value="{{$edu->end_date}}" name="end_date" id="end_date" class="form-control" required>
                                </div>
                            </div>

                            <!-- Degree/Field of Study Field -->
                            <div class="form-group mb-3">
                                <label for="degree">Degree/Field of Study</label>
                                <input type="text" name="field" value="{{$edu->field}}" id="field" class="form-control" placeholder="e.g., Bachelor of Science in Computer Science" required>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Populate countries on page load
    fetch('https://countriesnow.space/api/v0.1/countries')
        .then(response => response.json())
        .then(data => {
            const countrySelect = document.getElementById('country');
            data.data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.country;
                option.textContent = country.country;
                countrySelect.appendChild(option);
            });
        });

    // Populate universities based on selected country
  document.getElementById('country').addEventListener('change', function () {
    const country = this.value;
    const universitySelect = document.getElementById('university');
    
    universitySelect.innerHTML = '<option value="">Select University/School</option>';
    
    fetch(`http://universities.hipolabs.com/search?country=${country}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(university => {
                const option = document.createElement('option');
                option.value = university.name;
                option.textContent = university.name;
                universitySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching universities:', error));
});

});
</script>
