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
                  <strong class="card-title">Edit Information</strong>
                </div>
                <div class="card-body">
                  <form class="needs-validation" method="POST" action="{{route('update.info')}}" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$info->id}}" id="">
                    <!-- Name Field -->
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Name</label>
                      <input type="text" value="{{ $info->name }}" name="name" id="address-wpalaceholder" class="form-control"
                             placeholder="Enter your Name" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Role</label>
                      <input type="text" value="{{ $info->role }}" name="role" id="address-wpalaceholder" class="form-control"
                             placeholder="Enter your Role" required>
                    </div>

                    <!-- Email and Phone Fields -->
                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Email address</label>
                        <input type="email" value="{{ $info->email }}" name="email" class="form-control" id="exampleInputEmail2"
                               placeholder="Please Enter Your Email" required>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="custom-phone">Phone Number</label>
                        <input class="form-control input-phoneus" value="{{ $info->phone }}" name="phone" id="custom-phone" maxlength="14" required>
                      </div>
                    </div>

                    <!-- Address Field -->
                    <div class="form-group mb-3">
                      <label for="address-wpalaceholder">Address</label>
                      <input type="text" name="address" value="{{ $info->address }}" id="address-wpalaceholder" class="form-control"
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
                      <div class="form-group mb-3">
                        <label for="address-wpalaceholder">GitHub</label>
                        <input type="url" name="github" value="{{ $info->github }}" id="address-wpalaceholder" class="form-control"
                               placeholder="Enter your github link">
                      </div>
                      <div class="form-group mb-3">
                        <label for="address-wpalaceholder">Linkedin</label>
                        <input type="url" name="linkedin" value="{{ $info->linkedin }}" id="address-wpalaceholder" class="form-control"
                               placeholder="Enter your linkedin link">
                      </div>
                      <button class="btn btn-success text-dark col-md-2" type="submit">Update</button>
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
<style>
    /* Skills Input Field */
    #skills-input {
        border: 1px solid #007bff;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 16px;
        color: #495057;
    }
    #skills-input::placeholder {
        color: #6c757d;
        opacity: 0.7;
    }

    /* Tag Labels Styling */
    .tag {
        background-color: #0a0aa0;
        color: #ffffff;
        border-radius: 15px;
        margin: 4px;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
    }
    /* Close Button for Tag */
    .tag .close-btn {
        margin-left: 8px;
        color: #ffffff;
        font-weight: bold;
        cursor: pointer;
        font-size: 12px;
    }
    .tag .close-btn:hover {
        color: #ff0000;
    }
</style>

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
    