# TODO

- [x] Inspect current `resources/views/home/booking.blade.php`, `app/Http/Controllers/BookingController.php`, and `routes/web.php`.
- [x] Make the booking page functional: added the booking form that POSTs to the existing `POST /book` route (`book.store`).
- [x] Populate the room cards using `$rooms` from `BookingController@create`.
- [x] Add validation error display and success flash message display.
- [ ] Optional: Replace hardcoded asset paths (`images/...` and `css/...`) with `asset()` across this Blade template if you want full correctness in every environment.

