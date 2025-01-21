# Banyumanik Beauty Salon Project

## Table of Contents

- [Banyumanik Beauty Salon Project](#banyumanik-beauty-salon-project)
  - [Table of Contents](#table-of-contents)
  - [Overview](#overview)
  - [Requirements](#requirements)
  - [Installation](#installation)
  - [Features](#features)
  - [Folder Structure](#folder-structure)
  - [SQL Dump](#sql-dump)
  - [API Documentation](#api-documentation)
    - [Endpoints](#endpoints)
      - [POST `/appointment`](#post-appointment)
      - [Error Handling](#error-handling)
  - [Frontend](#frontend)
    - [HTML Structure](#html-structure)
    - [JavaScript](#javascript)
  - [Backend](#backend)
    - [Controller Logic](#controller-logic)
      - [AppointmentController](#appointmentcontroller)
  - [Known Issues](#known-issues)
  - [Future Improvements](#future-improvements)

---

## Overview

This project is a web-based application for **Banyumanik Beauty Salon**, providing features such as online appointment booking, review management, and payment tracking. Users can:

- Book treatments.
- Select therapists and locations.
- Manage and review appointments.

---

## Requirements

- PHP >= 8.0
- Laravel >= 9.x
- Node.js >= 14.x
- MySQL >= 5.7
- Composer >= 2.0

---

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/narendrafajar/OnlineBookingApps.git
   ```
2. Navigate to the project directory:
   ```bash
   cd banyumanik-salon
   ```
3. Install PHP dependencies:
   ```bash
   composer install
   ```
   ```
4. Set up the `.env` file:
   ```bash
   cp .env.example .env
   ```
   Database name : salon
   Configure the database and other settings in the `.env` file.

5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Seed the database (if necessary):
   ```bash
   php artisan db:seed
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```

---

## Features

- **Online Booking**:
  - Select treatments.
  - Choose therapists and locations.
  - Specify date and time.
- **Appointment Management**:
  - Track and review booked appointments.
- **Payment Details**:
  - View payment.

---

## Folder Structure

```plaintext
.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │       ├── ForUser
│   │   │           ├── AppointmentController.php
│   │   │           ├── HomeController.php
│   │   │   └── HomepageController.php
├── resources
│   ├── views
│   │   ├── layouts
│   │   ├── appointment
│   │   │   ├── user-page
│   │   │       ├── form-appointment-review.blade.php
│   │   │       ├── form-check-slots.blade.php
│   │   │       ├── form-preview.blade.php
│   │   │       ├── form-select-location.blade.php
│   │   │       ├── form-select-therapist.blade.php
│   │   │       ├── form-select-treatment.blade.php
├── public
│   ├── css
│   ├── js
│   │   ├── user-page
│   │   │   ├── appointment-reviews.js
│   │   │   ├── home.js
│   │   │   ├── location-select.js
│   │   │   ├── select-date.js
│   │   │   ├── therapist.js
│   │   │   └── treatment.js
        ├── homepage.js
        └── main.js
```     

---

## SQL Dump
Running command php artisan database:backup

## API Documentation

### Endpoints

#### POST `/appointment`

Create a new appointment.

- **Request Body**:

```json
{
  "params": {
    "location_id": 1,
    "treatments": [1, 2, 3],
    "date": "2025-01-25",
    "time": "14:00",
    "therapist": [5, 6]
  }
}
```

- **Response**:
  - Success:
    ```json
    {
      "success": true,
      "message": "Appointment successfully booked"
    }
    ```
  - Validation Error:
    ```json
    {
      "success": false,
      "errors": {
        "params.location_id": ["The location_id field is required."]
      }
    }
    ```

#### Error Handling

- **ValidationException** (422): Returns validation errors.
- **GeneralException** (500): Returns a generic error message.

---

## Frontend

### HTML Structure

The review page contains a responsive table for displaying order details, such as:

- Transaction ID.
- Customer details.
- Locations, treatments, therapist, date, and time.

Example of the HTML snippet:

```html
<div class="card">
  <h4 class="card-title text-center">Review</h4>
  <table>
    <tr>
      <td>ID Trans</td>
      <td>{{ $code }}</td>
    </tr>
    <tr>
      <td>Customer</td>
      <td>{{ Auth::user()->name }}</td>
    </tr>
    <!-- Other details -->
  </table>
</div>
```

### JavaScript

The `appointment-reviews.js` script handles form submissions and API interactions.

```javascript
$('#submitBtn').on('click', function () {
    axios.post('/appointment', {
        params: {
            location_id: selectedLocationId,
            treatments: selectedCards,
            date: selectedDate,
            time: selectedTime,
            therapist: selectedTherapist
        }
    }).then(function (response) {
        if (response.data.success) {
            alert('Appointment Successfully Booked');
            window.location.href = '/user-home';
        } else {
            alert('Error: ' + response.data.message);
        }
    }).catch(function (error) {
        if (error.response) {
            console.error('Validation Error:', error.response.data.errors);
        }
    });
});
```

---

## Backend

### Controller Logic

#### AppointmentController

- **Validation**:

```php
$validatedData = $request->validate([
    'params.location_id' => 'required|integer',
    'params.treatments' => 'required|array',
    'params.treatments.*' => 'integer',
    'params.date' => 'required|date',
    'params.time' => 'required|string',
    'params.therapist' => 'required|array',
    'params.therapist.*' => 'integer',
]);
```

- **Error Handling**:

```php
try {
    DB::transaction(function () use ($params) {
        // Store appointment logic
    });
    return response()->json(['success' => true], 200);
} catch (ValidationException $e) {
    return response()->json(['success' => false, 'errors' => $e->errors()], 422);
} catch (Exception $e) {
    return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
}
```

---

## Known Issues

- Error messages are not yet localized.
- Timezone discrepancies in appointment booking.

---

## Future Improvements

- Add support for multiple languages.
- Implement real-time notifications for appointment statuses.
- Enhance error handling with more descriptive messages.

---

For further questions, feel free to contact the development team!

