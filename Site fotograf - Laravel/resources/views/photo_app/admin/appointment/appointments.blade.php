<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Appointments</title>
<link rel="preload" href="{{ url('fonts/Saira_Condensed/SairaCondensed-Light.ttf') }}" as="font" crossorigin="anonymous" />
<link rel="preload" href="{{ url('fonts/Nunito/static/Nunito-ExtraLight.ttf') }}" as="font" crossorigin="anonymous" />
<script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ url('js/button.js') }}"></script>
<link href="{{ url('css/background.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('css/button.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="imd">

  @include('partials.navbar')

  <div class="mainHolder">
    <h1>Appointments</h1>
    <br>


    <table style="overflow: hidden;">
      <thead>
        <tr>
          <th scope="col">Appointment ID</th>
          <th scope="col">Client Details</th>
          <th scope="col">Event Type</th>
          <th scope="col">Event Date</th>
          <th scope="col">More Info</th>
          <th scope="col">Delete Appointment</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($appointments as $appointment)
        <tr>
          <td data-label="Appointment ID">{{ $appointment->id }}</td>
          <td data-label="Client Details" style="overflow: auto;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $appointment->id }}">
              View
            </button>
            <div class="modal fade" id="staticBackdrop{{ $appointment->id }}" style="z-index: 9;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: black">{{ $appointment->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color: black">
                    Client Name: {{ $appointment->name }}<br>
                    Client Phone:{{ $appointment->phone }}<br>
                    Client Email:{{ $appointment->email }}<br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td data-label="Event Type">{{ $appointment->event }}</td>
          <td data-label="Event Date">{{ $appointment->event_date }}</td>
          <td data-label="More Info">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{ $appointment->id }}">
              View
            </button>
            <div class="modal fade" id="staticBackdrop1{{ $appointment->id }}" style="z-index: 9;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: black">{{ $appointment->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color: black">
                    Message:<br> {{ $appointment->message }}

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td data-label="Delete Product">
            <form
            method="POST"
            action="{{ route('appointment.destroy', $appointment->id) }}"
            onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bxtn bxtn3">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
 @include("partials.background")
</body>
</html>