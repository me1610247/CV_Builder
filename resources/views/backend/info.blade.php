@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="row">

            <div class="col-md-8">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Basic Information</strong>
                </div>
                <div class="card-body">
                  <form class="needs-validation" method="POST" action="{{ route('save.info') }}" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Name</label>
                      <input type="text" name="name" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your Name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Role</label>
                      <input type="text" name="role" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your Role" value="{{ Auth::user()->role }}" required>
                    </div>

                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail2"
                          aria-describedby="emailHelp1" placeholder="Please Enter Your Email" value="{{ Auth::user()->email }}" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="custom-phone">Phone Number</label>
                        <input class="form-control input-phoneus" name="phone" id="custom-phone" maxlength="14" required>
                      </div>
                    </div> <!-- /.form-row -->

                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Address</label>
                      <input type="text" name="address" id="address-wpalaceholder" class="form-control"
                        placeholder="Enter your address">
                    </div>

                    <div class="form-group mb-3">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-control" required>
                          <option value="">Select Country</option>
                          <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="city">City/District</label>
                        <select id="city" name="city" class="form-control" required>
                          <option value="">Select City</option>
                          <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>

                    <!-- Optional fields for GitHub and LinkedIn -->
                    <div class="form-group mb-3">
                      <label for="github">GitHub Link (optional)</label>
                      <input type="url" name="github" id="github" class="form-control" placeholder="Enter your GitHub profile link">
                    </div>

                    <div class="form-group mb-3">
                      <label for="linkedin">LinkedIn Link (optional)</label>
                      <input type="url" name="linkedin" id="linkedin" class="form-control" placeholder="Enter your LinkedIn profile link">
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch all countries on page load
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

        // Fetch cities based on selected country
        document.getElementById('country').addEventListener('change', function () {
            const country = this.value;
            const citySelect = document.getElementById('city');

            // Clear previous city options
            citySelect.innerHTML = '<option value="">Select City</option>';

            // Fetch cities for the selected country
            fetch('https://countriesnow.space/api/v0.1/countries/cities', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ country: country })
            })
            .then(response => response.json())
            .then(data => {
                data.data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            });
        });
    });
</script>
