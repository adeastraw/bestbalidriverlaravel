# BEST BALI DRIVER — Laravel + MySQL Website Specification

> **Document purpose:** Master implementation prompt/specification for an AI coding agent (Google Antigravity or similar) to rebuild and improve the existing **Best Bali Driver** website using **Laravel + MySQL**.
>
> **Primary goal:** Build a professional, mobile-first Bali travel and private-driver website that feels personal, trustworthy, premium, and local — while keeping direct booking through WhatsApp as the primary conversion path.
>
> **Important:** Treat this document as the product and implementation specification. Do not invent business facts, prices, reviews, driver credentials, vehicle details, or service claims that have not been provided. Use placeholders or configurable database content where real data is unavailable.

---

# 1. PROJECT OVERVIEW

## 1.1 Business

**Business name:** Best Bali Driver  
**Business type:** Private Driver & Bali Travel Service  
**Location:** Bali, Indonesia

Best Bali Driver provides:

- Private driver services
- Bali trips and tours
- Tourist activities
- Vehicles for customer journeys
- Direct customer communication and booking through WhatsApp

The website is intended for travelers who want to:

1. Discover Bali travel services.
2. Learn about the available drivers.
3. Explore vehicles.
4. Browse trips and prices.
5. Explore activities.
6. Read customer reviews.
7. Contact/book directly through WhatsApp.

---

# 2. PRODUCT DIRECTION

The website is **not** a marketplace.

The website is **not** intended to be a complex online booking platform.

The core product concept is:

> **Travel Discovery Website + Service Catalog + Driver Profiles + Vehicle Catalog + Trip Catalog + Activity Catalog + Direct WhatsApp Booking**

Primary customer journey:

```text
Discover Bali
    ↓
Understand Best Bali Driver
    ↓
Meet Driver
    ↓
See Vehicles
    ↓
Explore Trips
    ↓
Open Trip Detail
    ↓
Explore Activities
    ↓
Read Reviews
    ↓
Contact / Book via WhatsApp
```

Primary conversion:

> **Website visitor → WhatsApp conversation**

Do not implement customer accounts, online payment, complicated booking calendars, or customer dashboards unless explicitly requested later.

---

# 3. EXISTING WEBSITE → LARAVEL REBUILD

The previous concept was built around Google Apps Script + Google Sheets.

The new implementation must be rebuilt using:

## Backend

- Laravel
- PHP
- Laravel Blade

## Database

- MySQL
- Laravel Migrations
- Eloquent ORM

## Frontend

Preferred:

- Blade
- Tailwind CSS
- Alpine.js where useful
- Vite

Use JavaScript only where it improves interaction. Avoid unnecessary frontend complexity.

## Development principles

Use:

- MVC architecture
- Eloquent models
- Form Requests for validation where appropriate
- Reusable Blade components
- Named routes
- Service/helper classes where business logic becomes reusable
- Configuration files / `.env` for environment-specific settings
- Database seeders for development/demo data

Keep the codebase modular and maintainable.

---

# 4. DESIGN DIRECTION

## 4.1 Visual Concept

Use:

> **Bali Nature + Tropical + Modern + Premium Local Travel**

The website should immediately communicate:

- Bali
- Nature
- Travel
- Local experience
- Comfort
- Trust
- Personal service

The design should feel like a real Bali journey rather than a generic travel-agency template.

Visual references may include:

- Rice terraces
- Tropical roads
- Mountains
- Beaches
- Waterfalls
- Forests
- Lakes
- Bali landscapes
- Cars traveling through Bali
- Driver with travelers
- Natural Bali scenery

Photography must be a major visual element.

---

# 5. BRAND PERSONALITY

The brand should feel:

- Friendly
- Local
- Trustworthy
- Professional
- Relaxed
- Natural
- Premium but approachable
- Personal rather than corporate

Avoid exaggerated luxury language unless supported by the actual business.

---

# 6. COLOR & VISUAL SYSTEM

Use a natural Bali-inspired palette.

## Primary

- Deep Forest Green
- Tropical Green

## Secondary

- Warm Cream
- Sand Beige
- Earthy Brown

## Accent

- Muted Terracotta
- Soft Olive

## Usage

Cream/beige should dominate large backgrounds.

Forest green should be used for:

- Navbar
- Primary headings
- Main CTA
- Important buttons
- Footer
- Selected interactive states

Maintain accessible text contrast.

Avoid:

- Neon colors
- Excessive gradients
- Excessive shadows
- Excessive glassmorphism
- Overly decorative Balinese ornaments
- Heavy pattern usage
- Excessive animations

The overall atmosphere should be:

> **Natural, calm, warm, elegant, tropical, trustworthy.**

---

# 7. INFORMATION ARCHITECTURE

The website must not be a single giant landing page only.

The new Laravel implementation must support **dedicated pages for major content types**.

## Public pages

### Main pages

- `/` — Home
- `/about` — About Best Bali Driver
- `/driver` — Driver listing
- `/driver/{driver:slug}` — Driver detail
- `/vehicles` — Vehicle listing
- `/vehicles/{vehicle:slug}` — Vehicle detail
- `/trips` — Trip listing
- `/trips/{trip:slug}` — Trip detail
- `/activities` — Activity listing
- `/activities/{activity:slug}` — Activity detail
- `/reviews` — Reviews
- `/contact` — Contact

Optional later:

- `/gallery` — Documentation/gallery
- `/faq` — Frequently Asked Questions
- `/blog` — Travel articles / Bali guide
- `/blog/{post:slug}` — Article detail

Do not create optional pages unless they are useful for the current scope.

---

# 8. GLOBAL LAYOUT

All pages must use a consistent global layout.

## Header / Navbar

Desktop:

- Logo / Best Bali Driver
- Home
- About
- Driver
- Vehicles
- Trips
- Activities
- Reviews
- Contact
- Primary WhatsApp CTA

Mobile:

- Logo
- Hamburger menu
- Expandable navigation
- Visible WhatsApp CTA

The active navigation item should be visually distinguishable.

## Footer

Include:

**Best Bali Driver**

Private Driver & Bali Travel Service

Links:

- Home
- About
- Driver
- Vehicles
- Trips
- Activities
- Reviews
- Contact

Contact:

- WhatsApp
- Instagram
- Email, when available
- Bali, Indonesia

Copyright:

> © Best Bali Driver

---

# 9. HOME PAGE

Route:

```text
GET /
```

The Home page is the main marketing and discovery page.

It should summarize the most important services and direct users toward the dedicated pages.

Recommended order:

```text
Hero
↓
Introduction
↓
Featured Driver(s)
↓
Featured Vehicle(s)
↓
Featured Trips
↓
Featured Activities
↓
Why Choose Us
↓
Reviews Preview
↓
Final CTA
```

---

## 9.1 Hero Section

Use a full-screen/cinematic Bali background image.

Possible imagery:

- Rice terrace
- Tropical road
- Mountain landscape
- Beach
- Waterfall
- Forest road

Use a subtle dark overlay for readability.

Content:

**Best Bali Driver**

**Explore Bali Your Way**

Supporting text:

**Private Driver • Bali Trips • Local Experience**

CTA:

- Explore Our Trips
- Book via WhatsApp

Hero should feel immersive and premium.

Use restrained animation:

- Fade-in
- Small slide-up
- Smooth scrolling

Do not make the hero heavy or distracting.

---

# 10. ABOUT PAGE

Route:

```text
GET /about
```

Purpose:

Introduce the business and establish trust.

## Sections

### 10.1 About Best Bali Driver

Explain:

- What the service provides
- Who it is for
- General service philosophy
- Bali coverage

Do not create unsupported claims.

### 10.2 Our Approach

Possible themes:

- Local knowledge
- Comfortable travel
- Flexible planning
- Direct communication
- Personal service

### 10.3 Why Travelers Choose Us

Use concise service benefits supported by available business information.

### 10.4 CTA

End with:

> Ready to explore Bali?

Button:

> Contact via WhatsApp

---

# 11. DRIVER PAGE

Route:

```text
GET /driver
```

Purpose:

Display available drivers.

## Driver listing

Each driver card should show:

- Photo
- Name
- Short introduction
- Languages
- Service area
- Status/availability if applicable
- View Details button
- WhatsApp button

Use responsive grid/list layouts.

---

# 12. DRIVER DETAIL PAGE

Route:

```text
GET /driver/{driver:slug}
```

Purpose:

Create a full profile for each driver.

Recommended structure:

```text
Driver Hero
↓
Profile Summary
↓
Experience
↓
Languages
↓
Service Area
↓
Vehicles
↓
Associated Trips
↓
Reviews
↓
WhatsApp CTA
```

## Driver Hero

Display:

- Large driver photo
- Driver name
- Short title
- Location/service area
- Primary CTA

Example:

> Your Local Driver in Bali

## Profile

Include only verified information:

- Biography
- Experience
- Languages
- Service area
- Specialties

## Related content

Show:

- Vehicles used by this driver
- Trips available with this driver
- Reviews related to the driver

## CTA

> Book / Ask this Driver via WhatsApp

Generate contextual WhatsApp message dynamically.

---

# 13. VEHICLES PAGE

Route:

```text
GET /vehicles
```

Purpose:

Display all available vehicles.

Vehicle cards:

- Vehicle photo
- Name
- Type
- Passenger capacity
- Key facilities
- Short description
- View Details
- Ask via WhatsApp

Example:

> Toyota Avanza  
> Up to 6 passengers  
> Comfortable • Air Conditioning • Spacious

All vehicle information must come from the database.

---

# 14. VEHICLE DETAIL PAGE

Route:

```text
GET /vehicles/{vehicle:slug}
```

Purpose:

Provide complete vehicle information.

## Structure

```text
Vehicle Gallery
↓
Vehicle Overview
↓
Specifications
↓
Facilities
↓
Capacity
↓
Suitable For
↓
Related Trips
↓
Related Drivers
↓
WhatsApp CTA
```

## Gallery

Support multiple images.

Desktop:

- Main image
- Thumbnail gallery

Mobile:

- Swipeable carousel

## Specifications

Examples:

- Vehicle type
- Passenger capacity
- Luggage capacity, if known
- Air conditioning
- Facilities
- Additional notes

Only display known data.

---

# 15. TRIPS PAGE

Route:

```text
GET /trips
```

This is one of the most important pages.

## Goal

Help visitors compare available trips before opening a detailed trip page.

## Filters

Use practical filters when there is enough data:

- Category
- Area
- Duration
- Price range

Do not implement complicated search unless necessary.

## Trip cards

Every card should contain:

- Image
- Trip name
- Category
- Location/area
- Duration
- Starting price / price
- Short description
- View Trip button
- WhatsApp CTA

---

# 16. TRIP DETAIL PAGE

Route:

```text
GET /trips/{trip:slug}
```

This page must be detailed enough that customers do not need to return to the listing to understand the trip.

## Recommended structure

```text
Trip Hero
↓
Overview
↓
Trip Information
↓
Destinations
↓
Itinerary
↓
Included
↓
Not Included
↓
Available Activities
↓
Recommended Vehicle
↓
Related Trips
↓
Important Information
↓
Book This Trip
```

## Trip Hero

Display:

- Large image
- Trip name
- Location
- Duration
- Price
- Main CTA

## Trip Overview

Explain the experience in clear language.

## Trip Information

Display:

- Duration
- Area
- Price
- Recommended group size if known
- Pickup information if available

## Destinations

Use structured cards/list.

Each destination may contain:

- Name
- Short description
- Photo

## Itinerary

Use a timeline or numbered schedule.

Example:

```text
08:00 — Hotel pickup
09:00 — Destination A
11:30 — Destination B
13:00 — Lunch
15:00 — Destination C
17:00 — Return
```

Do not invent exact times unless supplied.

## Included

Examples:

- Private driver
- Vehicle
- Fuel, if applicable

## Not Included

Examples:

- Entrance tickets
- Meals
- Activity fees

Only show confirmed information.

## Available Activities

Connect the trip with activities from the activities table.

Example:

- ATV
- Rafting
- Snorkeling

Each activity links to its activity detail page.

## Booking CTA

Primary button:

> Book This Trip via WhatsApp

Dynamic message example:

```text
Hello Best Bali Driver,

I am interested in the [TRIP NAME].

Trip: [TRIP NAME]
Duration: [DURATION]
Date: [CUSTOMER WILL FILL THIS]
Guests: [CUSTOMER WILL FILL THIS]

Could you please provide more information and availability?

Thank you.
```

The WhatsApp destination number must come from configuration.

---

# 17. ACTIVITIES PAGE

Route:

```text
GET /activities
```

Display available tourist activities.

Examples may include:

- Hiking
- Rafting
- ATV
- Snorkeling
- Diving
- Jet Ski
- Watersport

Do not assume that every example above is actually offered.

Activity card:

- Image
- Name
- Location
- Short description
- Duration
- Price / starting price, if available
- View Details
- Ask via WhatsApp

---

# 18. ACTIVITY DETAIL PAGE

Route:

```text
GET /activities/{activity:slug}
```

Structure:

```text
Activity Hero
↓
Overview
↓
Location
↓
Duration
↓
Price
↓
What to Expect
↓
Requirements / Important Information
↓
Related Trips
↓
Related Activities
↓
WhatsApp CTA
```

Possible details:

- Activity description
- Location
- Duration
- Price
- Age restrictions, if known
- Equipment, if included
- Preparation requirements
- Safety notes, if supplied
- What is included
- What is not included

Never create fake pricing.

When no pricing exists:

> Price: Contact Us

---

# 19. REVIEWS PAGE

Route:

```text
GET /reviews
```

Purpose:

Build trust using real customer feedback.

## Review card

Display:

- Rating
- Customer name
- Country
- Review
- Related trip
- Driver
- Photo/avatar when available

Do not create fake reviews.

When real reviews are not available, use clearly marked placeholders in development only.

---

# 20. REVIEWS PREVIEW ON HOME

The Home page should show a small number of featured reviews.

Example:

- 3 reviews on desktop
- Responsive carousel on mobile

Button:

> Read All Reviews

Link:

```text
/reviews
```

---

# 21. WHY CHOOSE US SECTION

Can be used on Home and About pages.

Possible pillars:

## Local Experience

Discover Bali with a driver familiar with the island.

## Comfortable Journey

Travel with a prepared vehicle.

## Flexible Trip

Choose experiences based on your schedule.

## Easy Booking

Contact directly through WhatsApp.

Use simple icons.

Do not overuse decorative graphics.

---

# 22. CONTACT PAGE

Route:

```text
GET /contact
```

Purpose:

Make contacting Best Bali Driver extremely easy.

## Content

Display:

- Business name
- Short contact message
- WhatsApp
- Instagram
- Email, if available
- Bali, Indonesia
- Optional business hours
- Optional service coverage

## Primary CTA

> Chat via WhatsApp

## Optional contact information form

A simple inquiry form may be included if useful.

However, WhatsApp remains the primary communication path.

---

# 23. FINAL CTA

Place a strong CTA near the end of Home, Trips, Trip Detail, Activities, and relevant detail pages.

Use a large Bali landscape image.

Possible background:

- Sunset
- Rice terrace
- Mountain
- Tropical road
- Beach

Text:

> **Ready to Explore Bali?**

> **Let's Make Your Bali Journey Memorable.**

Button:

> **Book via WhatsApp**

The CTA should feel like a natural next step, not an aggressive advertisement.

---

# 24. WHATSAPP BOOKING SYSTEM

WhatsApp is the primary booking channel.

Do not create a payment gateway in the initial version.

## WhatsApp CTA locations

At minimum:

- Hero
- Driver detail
- Vehicle detail
- Trip cards
- Trip detail
- Activity cards
- Activity detail
- Contact
- Footer
- Floating mobile button

## Dynamic message generation

Create a reusable helper/service for WhatsApp links.

Example concepts:

```php
whatsappUrl($message)
```

or a dedicated service:

```php
WhatsAppService
```

The implementation should keep message formatting centralized.

## Configuration

Store the WhatsApp business number in:

```text
.env
```

Example:

```env
WHATSAPP_NUMBER=628xxxxxxxxxx
```

Do not hardcode the number throughout Blade files.

---

# 25. DATABASE DESIGN

Use MySQL with Laravel migrations.

The database should support dynamic content.

---

## 25.1 users

Use Laravel's standard users table if admin authentication is implemented.

Fields:

- id
- name
- email
- password
- remember_token
- timestamps

---

## 25.2 drivers

Fields:

- id
- name
- slug
- photo
- short_bio
- description
- experience
- languages
- service_area
- phone
- status
- sort_order
- timestamps

Recommended:

- `slug` unique
- `status` boolean
- indexed status/slug where useful

---

## 25.3 vehicles

Fields:

- id
- name
- slug
- type
- capacity
- luggage_capacity, nullable
- description
- facilities
- photo
- status
- sort_order
- timestamps

---

## 25.4 vehicle_images

For gallery support:

- id
- vehicle_id
- image_path
- alt_text
- sort_order
- timestamps

Relationship:

```text
Vehicle hasMany VehicleImage
```

---

## 25.5 trips

Fields:

- id
- name
- slug
- category
- location
- duration
- price
- price_label, nullable
- short_description
- description
- hero_image
- status
- featured
- sort_order
- timestamps

Price should be nullable because some trips may use:

> Contact Us

---

## 25.6 trip_destinations

Fields:

- id
- trip_id
- name
- description
- image
- sort_order
- timestamps

---

## 25.7 trip_itineraries

Fields:

- id
- trip_id
- title
- description
- time_label, nullable
- sort_order
- timestamps

Do not require exact time values when the business has not provided them.

---

## 25.8 trip_inclusions

Fields:

- id
- trip_id
- type
- description
- sort_order
- timestamps

Where:

```text
type = included
type = not_included
```

---

## 25.9 activities

Fields:

- id
- name
- slug
- location
- duration
- price, nullable
- price_label, nullable
- short_description
- description
- image
- status
- featured
- sort_order
- timestamps

---

## 25.10 reviews

Fields:

- id
- customer_name
- country
- rating
- review
- trip_id, nullable
- driver_id, nullable
- image, nullable
- status
- featured
- timestamps

Rating should be constrained to an appropriate range such as:

```text
1–5
```

---

## 25.11 settings

A small site settings table can store editable business-level configuration.

Examples:

- business_name
- tagline
- whatsapp_number
- instagram_url
- email
- address
- footer_text
- hero_title
- hero_subtitle

Use a key/value structure if appropriate.

---

# 26. DATABASE RELATIONSHIPS

Expected relationships:

```text
Driver
 ├── hasMany Reviews
 └── belongsToMany / related Trips as required

Vehicle
 ├── hasMany VehicleImages
 └── belongsToMany Trips

Trip
 ├── hasMany TripDestinations
 ├── hasMany TripItineraries
 ├── hasMany TripInclusions
 ├── belongsToMany Activities
 ├── belongsToMany Vehicles
 ├── belongsToMany Drivers
 └── hasMany Reviews

Activity
 ├── belongsToMany Trips
 └── optionally belongsToMany related Activities

Review
 ├── belongsTo Trip
 └── belongsTo Driver
```

Use pivot tables where many-to-many relationships are appropriate.

---

# 27. IMAGE STORAGE

Use Laravel's filesystem.

Preferred:

```text
storage/app/public
```

and:

```bash
php artisan storage:link
```

Image paths should be stored in the database, not full hardcoded URLs.

Design the storage structure so it can later move to object storage without rewriting the entire application.

Example directories:

```text
storage/app/public/
    drivers/
    vehicles/
    trips/
    activities/
    reviews/
    general/
```

---

# 28. ADMIN / CONTENT MANAGEMENT

The old concept relied on Google Sheets.

The Laravel version should move content management into MySQL.

## Initial admin scope

Create a simple authenticated admin area.

Recommended:

```text
/admin
```

Admin should be able to manage:

- Drivers
- Vehicles
- Vehicle images
- Trips
- Trip destinations
- Trip itineraries
- Trip inclusions
- Activities
- Reviews
- Basic site settings

## Admin priorities

Admin UI should prioritize:

- Create
- Read
- Update
- Delete
- Publish/unpublish
- Featured/unfeatured
- Sort/order
- Image upload

Do not make the admin dashboard unnecessarily complex.

---

# 29. ADMIN DASHBOARD

Route:

```text
/admin
```

Show simple summary cards:

- Total Drivers
- Total Vehicles
- Total Trips
- Total Activities
- Total Reviews

Optional:

- Recently updated content
- Quick actions

The dashboard is for managing content, not for complex analytics.

---

# 30. ROUTING

Use named routes.

Example:

```php
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/driver', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/driver/{driver:slug}', [DriverController::class, 'show'])->name('drivers.show');

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{vehicle:slug}', [VehicleController::class, 'show'])->name('vehicles.show');

Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/{trip:slug}', [TripController::class, 'show'])->name('trips.show');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/{activity:slug}', [ActivityController::class, 'show'])->name('activities.show');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
```

Adapt route naming if the final application structure requires it, but maintain clear REST-style conventions.

---

# 31. CONTROLLERS

Recommended public controllers:

```text
HomeController
AboutController
DriverController
VehicleController
TripController
ActivityController
ReviewController
ContactController
```

Admin controllers should be namespaced:

```text
Admin/
    DashboardController
    DriverController
    VehicleController
    VehicleImageController
    TripController
    TripDestinationController
    TripItineraryController
    TripInclusionController
    ActivityController
    ReviewController
    SettingController
```

Do not put large amounts of business logic directly inside Blade files.

---

# 32. BLADE COMPONENT SYSTEM

Create reusable components wherever the same UI appears repeatedly.

Examples:

```text
components/
    navbar.blade.php
    footer.blade.php
    whatsapp-button.blade.php
    trip-card.blade.php
    activity-card.blade.php
    driver-card.blade.php
    vehicle-card.blade.php
    review-card.blade.php
    breadcrumb.blade.php
    section-heading.blade.php
    image-card.blade.php
```

Components should accept data through props.

Avoid duplicating identical markup across pages.

---

# 33. LAYOUT STRUCTURE

Suggested Blade structure:

```text
resources/views/
    layouts/
        app.blade.php
        admin.blade.php

    components/
        navbar.blade.php
        footer.blade.php
        whatsapp-button.blade.php
        ...

    home/
        index.blade.php

    about/
        index.blade.php

    drivers/
        index.blade.php
        show.blade.php

    vehicles/
        index.blade.php
        show.blade.php

    trips/
        index.blade.php
        show.blade.php

    activities/
        index.blade.php
        show.blade.php

    reviews/
        index.blade.php

    contact/
        index.blade.php

    admin/
        dashboard.blade.php
        drivers/
        vehicles/
        trips/
        activities/
        reviews/
        settings/
```

---

# 34. SEO

The Laravel implementation must be more SEO-ready than the old GAS version.

## Every public page should support

- Unique `<title>`
- Meta description
- Canonical URL
- Open Graph title
- Open Graph description
- Open Graph image
- Semantic heading hierarchy
- SEO-friendly URLs
- Descriptive image alt text

Example:

```text
/trips
/trips/bali-east-trip
/driver/john-doe
/vehicles/toyota-avanza
/activities/atv-adventure
```

Avoid:

```text
/page?id=123
```

---

# 35. STRUCTURED DATA

Where appropriate, consider Schema.org structured data such as:

- LocalBusiness
- TouristTrip / TouristAttraction where appropriate
- Review
- BreadcrumbList

Only output structured data that accurately represents actual content.

Do not fabricate ratings, addresses, prices, or business information.

---

# 36. PERFORMANCE

Website should be fast on mobile.

Requirements:

- Optimize images
- Use WebP/modern formats where possible
- Lazy-load non-critical images
- Avoid enormous source images when smaller dimensions are sufficient
- Minimize unnecessary JavaScript
- Keep CSS organized
- Avoid excessive third-party libraries
- Use pagination for large lists
- Use eager loading strategically to avoid N+1 database queries

Target:

> Fast, lightweight, usable even on normal mobile connections.

---

# 37. RESPONSIVE DESIGN

Mobile-first is mandatory.

## Mobile

- Single-column layouts where appropriate
- Swipeable galleries
- Easy-to-read prices
- Large touch targets
- Sticky/floating WhatsApp button
- Compact navigation
- No horizontal overflow

## Tablet

Use balanced multi-column layouts.

## Desktop

Use:

- Wider content areas
- Multi-column grids
- Larger photography
- Split layouts
- More whitespace

---

# 38. ACCESSIBILITY

Implement basic accessibility best practices.

Requirements:

- Semantic HTML
- Alt text for meaningful images
- Sufficient contrast
- Keyboard-friendly interactive elements
- Visible focus states
- Buttons with meaningful labels
- Form labels
- Avoid text embedded only inside images

Do not sacrifice accessibility for visual effects.

---

# 39. UX PRINCIPLES

Customers should never need to search for how to contact the business.

The primary CTA should always be obvious:

> **Book via WhatsApp**

But do not place an aggressive CTA after every sentence.

Use CTA placement naturally:

- Hero
- Card actions
- Detail pages
- End-of-page CTA
- Floating mobile button

The intended emotional flow is:

```text
Curiosity
↓
Trust
↓
Understanding
↓
Interest
↓
Trip Selection
↓
Confidence
↓
WhatsApp Conversation
```

---

# 40. ERROR & EMPTY STATES

The site must handle missing content gracefully.

Examples:

## No trips

Display:

> No trips are currently available.

## No activities

Display:

> Activities will be updated soon.

## Missing price

Display:

> Price: Contact Us

## Missing image

Use a consistent fallback image or clean placeholder.

## Invalid detail URL

Return Laravel 404 page with:

> Looks like this journey took a wrong turn.

Button:

> Back to Home

The error page should still maintain the site's visual identity.

---

# 41. SECURITY

Follow normal Laravel security practices.

Requirements:

- CSRF protection
- Validation
- Authorization for admin routes
- Password hashing
- Escaped Blade output
- Secure file upload validation
- Restrict dangerous file types
- Do not expose secrets in source code
- Use `.env` for credentials
- Protect admin routes with authentication middleware

Do not trust uploaded filenames or user-submitted form values.

---

# 42. SEEDERS & SAMPLE DATA

Create Laravel seeders for development.

Use realistic but clearly placeholder data.

Do not create fake reviews that look like authentic customer testimonials.

For reviews, use:

```text
[PLACEHOLDER REVIEW]
```

or leave the records empty until real data is available.

Seeders should make the application immediately viewable after setup.

---

# 43. CONFIGURATION

Centralize:

- Business name
- Tagline
- WhatsApp number
- Instagram URL
- Email
- Address
- Default SEO
- Default images
- Site settings

Prefer database-driven values for editable business content and `.env` for environment/secrets.

---

# 44. RECOMMENDED DEVELOPMENT PHASES

Build in logical phases.

## Phase 1 — Foundation

- Laravel project setup
- MySQL connection
- Authentication/admin foundation
- Tailwind/Vite setup
- Base layout
- Navbar
- Footer
- Global styling
- Database migrations

## Phase 2 — Core Content

- Drivers
- Vehicles
- Trips
- Activities
- Reviews
- Seeders

## Phase 3 — Public Pages

- Home
- About
- Driver listing/detail
- Vehicle listing/detail
- Trip listing/detail
- Activity listing/detail
- Reviews
- Contact

## Phase 4 — Admin

- Dashboard
- CRUD
- Publish/unpublish
- Featured
- Sorting
- Image management

## Phase 5 — Conversion

- WhatsApp helper/service
- Dynamic messages
- Floating WhatsApp CTA
- Detail-page CTA

## Phase 6 — Polish

- Responsive refinement
- Loading states
- Empty states
- 404 page
- Accessibility
- SEO metadata
- Open Graph
- Performance optimization

---

# 45. UI INTERACTION

Use interaction carefully.

Allowed:

- Mobile menu
- Dropdowns
- Tabs
- Image carousel
- Lightbox
- Accordion
- Smooth scrolling
- Subtle reveal animations
- Hover states
- Loading indicators

Avoid:

- Full-page unnecessary animations
- Heavy parallax
- Constant motion
- Auto-playing video with sound
- Excessive transition effects
- Interactions that reduce usability

The website should feel polished, not over-engineered.

---

# 46. PAGE-BY-PAGE ACCEPTANCE CRITERIA

## Home

Must:

- Communicate the brand immediately
- Show Bali imagery
- Explain the service
- Show featured content
- Provide clear WhatsApp access
- Link to detailed pages

## About

Must:

- Explain the business
- Build trust
- Avoid unsupported claims
- End with CTA

## Driver listing

Must:

- Display dynamic driver records
- Link to individual detail pages
- Support empty states

## Driver detail

Must:

- Show complete profile
- Show related content
- Include contextual WhatsApp CTA

## Vehicle listing

Must:

- Show available vehicles
- Display capacity and main details

## Vehicle detail

Must:

- Show gallery
- Show specifications
- Show related trips/drivers
- Include WhatsApp CTA

## Trips listing

Must:

- Show trip cards
- Show price/duration clearly
- Support filtering when useful

## Trip detail

Must:

- Show detailed itinerary
- Show destinations
- Show included/not included
- Show activities
- Show booking CTA

## Activities listing

Must:

- Show activity cards
- Show available price information
- Link to activity detail

## Activity detail

Must:

- Explain the activity
- Show practical details
- Show related trips
- Include WhatsApp CTA

## Reviews

Must:

- Show real review data only
- Support filtering/pagination if the amount of data becomes large

## Contact

Must:

- Make WhatsApp obvious
- Provide other contact channels when available

---

# 47. COMPONENT CONSISTENCY

Maintain consistent:

- Border radius
- Card style
- Typography
- Spacing scale
- Button style
- Image proportions
- Section heading style
- Icon usage
- Mobile behavior

Do not design each page as if it belongs to a different website.

---

# 48. TYPOGRAPHY

Use elegant, highly readable typography.

Possible direction:

- Serif or refined display font for major headings
- Clean sans-serif for body text and UI

Do not use too many font families.

Recommended hierarchy:

```text
Display
H1
H2
H3
Body
Small / Metadata
Button
```

Headings should feel premium without becoming difficult to read.

---

# 49. PHOTOGRAPHY SYSTEM

Photography should be one of the strongest visual assets.

Prioritize:

- Large hero images
- Human-focused driver photos
- Vehicle photography
- Destination images
- Activity/action photography
- Natural Bali scenery

Use consistent image aspect ratios across cards.

Every meaningful image requires useful alt text.

---

# 50. NAVIGATION STRATEGY

Main menu:

```text
Home
About
Driver
Vehicles
Trips
Activities
Reviews
Contact
```

Primary CTA:

```text
Book via WhatsApp
```

On desktop, the CTA should have enough visual emphasis.

On mobile, the floating WhatsApp button should remain easy to access without blocking important content.

---

# 51. SEARCH / FILTER STRATEGY

Initial version does not require a global site search.

Trips and activities may use lightweight filters.

Example Trip filters:

```text
Category
Location
Duration
Price
```

Example Activity filters:

```text
Location
Type
Price
Duration
```

Only implement filters that correspond to real database fields and materially improve usability.

---

# 52. PAGINATION

Use pagination when lists become long.

Examples:

```php
Trip::where('status', true)->paginate(12)
```

Do not load hundreds of records into one page unnecessarily.

Maintain clean pagination styling consistent with the website.

---

# 53. DATABASE QUERY QUALITY

Avoid N+1 queries.

Use eager loading when necessary:

```php
Trip::with([
    'destinations',
    'itineraries',
    'activities',
    'vehicles'
])
```

Do not blindly eager-load every relationship everywhere.

Load only what each page needs.

---

# 54. MODEL & VALIDATION QUALITY

Use Laravel model conventions.

Important fields:

- `slug` should be unique.
- Numeric prices should use appropriate database types.
- Boolean statuses should use boolean-compatible fields.
- Nullable fields should be explicitly nullable.
- Sort order should have a sensible default.
- Ratings should be constrained to 1–5.

Validate uploads:

- MIME type
- File size
- Image dimensions where appropriate

---

# 55. ADMIN CONTENT RULES

The admin must make it possible to update website content without editing PHP/Blade files.

Examples:

- Change trip price
- Add trip
- Hide trip
- Add activity
- Add driver
- Add vehicle
- Upload photos
- Edit review
- Feature a trip
- Change WhatsApp number
- Update social media

This is the main advantage of moving from Google Sheets/GAS to Laravel + MySQL.

---

# 56. NO UNNECESSARY FEATURES

Do NOT add these in the initial scope:

- Customer registration
- Customer login
- Online payment
- Complex booking calendar
- Customer dashboard
- Loyalty system
- Chat system
- AI chatbot
- Complex analytics
- Marketplace functionality
- Multi-vendor system

The initial product should remain focused.

---

# 57. FUTURE-READY ARCHITECTURE

The architecture should leave room for future additions without requiring a full rewrite.

Potential future features:

- Online booking
- Availability calendar
- Payment gateway
- Travel blog
- Destination pages
- Multi-language support
- Customer accounts
- Booking management
- Email notifications
- Admin analytics

Do not implement these now unless explicitly requested.

---

# 58. MULTI-LANGUAGE READINESS

The primary website language may start in English because the target audience includes international travelers.

However, avoid hardcoding UI text in scattered templates when practical.

Design the application so Indonesian can be introduced later.

Potential future locales:

```text
en
id
```

Do not build a complicated localization system unless required by the current scope.

---

# 59. CONTENT RULES

The agent must follow these content rules:

1. Never invent business credentials.
2. Never invent real customer testimonials.
3. Never invent prices and represent them as final.
4. Never invent driver experience.
5. Never invent vehicle specifications.
6. Never invent hotel pickup policies.
7. Never invent service coverage.
8. Use placeholders when business data is unavailable.
9. Make placeholder content easy to replace through admin/data.
10. Keep marketing copy natural and credible.

---

# 60. HOME PAGE CONTENT PRIORITY

The Home page should prioritize these questions:

### What is this?

> Best Bali Driver — Private Driver & Bali Travel Service.

### Why should I care?

> Local, comfortable, flexible Bali travel support.

### What can I book?

> Driver, vehicles, trips, and activities.

### How much does it cost?

> Show available trip pricing clearly.

### Can I trust this service?

> Driver profiles, transparent information, and real reviews.

### How do I book?

> WhatsApp.

---

# 61. MICROCOPY STYLE

Use concise and natural copy.

Avoid overly generic phrases such as:

> "Embark on an unforgettable journey with our world-class luxury solutions."

Prefer:

> "Explore Bali with a local driver and a trip that fits your day."

The tone should feel human and believable.

---

# 62. DESIGN REFERENCE

The visual experience should feel like a blend of:

```text
Bali Nature
+
Boutique Resort
+
Modern Travel Website
+
Local Driver Service
```

Desired feeling:

> "I am planning my Bali trip."

Not:

> "I am looking at a generic travel agency website."

Visual journey:

```text
Nature
↓
Local Driver
↓
Vehicle
↓
Destination
↓
Activities
↓
Experience
↓
Booking
```

---

# 63. FINAL IMPLEMENTATION PRINCIPLE

Build the website as a real Laravel application, not as a static page converted into Laravel.

Content must be dynamic.

Major sections must have dedicated detail pages.

The database must represent the content structure.

The admin must be able to manage the content.

The public website must remain lightweight and visually polished.

The WhatsApp booking path must be extremely clear.

---

# 64. AGENT EXECUTION RULES

When implementing this project:

1. Inspect the existing project before changing architecture.
2. Preserve useful existing design/content where appropriate.
3. Refactor rather than duplicate code.
4. Prefer reusable components.
5. Use migrations instead of manually modifying the production database schema.
6. Use seeders for development data.
7. Use route model binding with slugs where appropriate.
8. Validate all admin input.
9. Keep image handling centralized.
10. Keep WhatsApp generation centralized.
11. Do not hardcode business configuration across views.
12. Do not introduce unnecessary dependencies.
13. Test desktop and mobile layouts.
14. Check for broken routes and missing images.
15. Check for N+1 database queries.
16. Check SEO metadata on public pages.
17. Check empty states.
18. Check 404 behavior.
19. Make the application usable with realistic placeholder data.
20. Keep the code understandable for a developer who will maintain it later.

---

# 65. DEFINITION OF DONE

The project is considered complete for the MVP when:

- Laravel application runs successfully.
- MySQL database is connected.
- Migrations execute successfully.
- Seeders create usable development data.
- Public pages are accessible.
- Major content types have listing + detail pages.
- Driver detail pages work.
- Vehicle detail pages work.
- Trip detail pages work.
- Activity detail pages work.
- Reviews page works.
- Contact page works.
- Admin authentication works.
- Admin CRUD works for major content.
- Images upload and display correctly.
- WhatsApp CTAs generate contextual messages.
- Website is responsive.
- Website has polished visual consistency.
- SEO basics are implemented.
- No fake business claims are presented as facts.
- No critical console/runtime/database errors remain.
- No obvious N+1 issues remain on primary pages.
- The site can be extended without rewriting its core structure.

---

# 66. FINAL COMMAND TO THE AGENT

> **Build Best Bali Driver as a complete Laravel + MySQL website according to this specification.**
>
> Start by understanding the existing project and identify what should be preserved, refactored, or rebuilt.
>
> Prioritize architecture, dynamic data, reusable components, responsive UX, dedicated detail pages, professional visual design, SEO readiness, image management, and direct WhatsApp conversion.
>
> Do not rush into adding every feature at once. Build the core foundation cleanly, verify each page, then continue to the next phase.
>
> When real business data is unavailable, use clearly identifiable placeholders rather than fabricated facts.
>
> The final result should look and behave like a polished, real-world Bali private-driver business website — not a generic template and not a static mockup.
