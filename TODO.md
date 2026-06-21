# TODO - Make site fully dynamic (testing + static removal)

- [ ] Inspect which static `public/*.html` pages exist and remove them (so Laravel routes are the only entrypoints)
- [ ] Add Feature tests for dynamic routes: `/`, `/rooms`, `/gallery`, `/blog`, `/about`, `/contact`, `/book/{room_id?}`
- [ ] Add Unit/Controller tests:
  - [ ] HomeController queries filter `active/published`
  - [ ] storeContact persists `contact_messages` + validation
  - [ ] BookingController store persists `bookings` + validation
- [ ] Update Blade templates to remove hardcoded sections (home.index/about/contact/gallery/blog)
- [ ] Run `php artisan test` and fix any failures
- [ ] Run `phpunit` (if needed) and ensure green test suite

