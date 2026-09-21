<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Driver;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Trip;
use App\Models\TripDestination;
use App\Models\TripInclusion;
use App\Models\TripItinerary;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@bestbalidriver.com'],
            [
                'name' => 'Admin Best Bali Driver',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            'business_name' => 'Best Bali Driver',
            'tagline' => 'Private Driver & Authentic Bali Tours',
            'whatsapp_number' => '6281234567890',
            'instagram_url' => 'https://instagram.com/bestbalidriver',
            'email' => 'info@bestbalidriver.com',
            'address' => 'Jl. Raya Pengosekan, Ubud, Gianyar, Bali 80571 - Indonesia',
            'business_hours' => 'Daily: 07:00 AM - 10:00 PM WITA',
            'hero_title' => 'Explore Bali Your Way',
            'hero_subtitle' => 'Private Driver • Custom Tours • Local Experience',
            'footer_text' => 'Your trusted private driver and Bali travel companion. We offer comfortable vehicles, experienced local drivers, and tailored itineraries for an unforgettable island holiday.',
            'about_story' => 'Best Bali Driver was founded by local Balinese drivers passionate about sharing the true beauty and cultural heritage of our island. We understand that every traveler has a unique dream journey, which is why we focus on flexibility, comfort, safety, and personalized Balinese hospitality.',
        ];

        foreach ($settings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // 3. Drivers
        $driversData = [
            [
                'name' => 'Wayan Sukadana',
                'slug' => 'wayan-sukadana',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=700&q=80',
                'short_bio' => 'Senior Bali driver & cultural guide with over 10 years of experience navigating the island.',
                'description' => "Om Swastyastu! My name is Wayan Sukadana. I was born and raised in Ubud, Bali. For over a decade, I have had the privilege of guiding travelers from all over the world across our island of the gods.\n\nI specialize in Balinese cultural heritage, temple etiquette, and hidden natural waterfalls. My priority is always your safety, comfort, and ensuring you experience Bali through the eyes of a local friend.",
                'experience' => '10+ Years',
                'languages' => 'English, Indonesian, Balinese',
                'service_area' => 'All Bali (Ubud, Denpasar, Badung, Gianyar, Karangasem)',
                'phone' => '+62 812-3456-7890',
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Ketut Artawan',
                'slug' => 'ketut-artawan',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=700&q=80',
                'short_bio' => 'Gentle, punctual, and highly knowledgeable in North Bali highland routes and waterfalls.',
                'description' => "Hello, I am Ketut Artawan. With 7 years of professional driving experience, I pride myself on smooth, calm driving through Bali's winding scenic mountain passes.\n\nI love photography and know the best lighting angles for your vacation photos at Ulun Danu Beratan, Jatiluwih, and Banyumala waterfalls. Looking forward to welcoming you to Bali!",
                'experience' => '7+ Years',
                'languages' => 'English, Indonesian',
                'service_area' => 'All Bali (Bedugul, Lovina, Tabanan, Ubud, Kuta)',
                'phone' => '+62 812-3456-7891',
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Made Darma',
                'slug' => 'made-darma',
                'photo' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=700&q=80',
                'short_bio' => 'Professional, multilingual driver with conversational Japanese & English, South Bali specialist.',
                'description' => "Welcome to Bali! I am Made Darma from Sanur. I have been driving travelers for 8 years. Whether you need an airport transfer, a beach-hopping day in Uluwatu, or a sunset seafood trip to Jimbaran, I am here to make your day relaxed and smooth.\n\nI speak fluent English and conversational Japanese, and I always ensure the vehicle is immaculate.",
                'experience' => '8+ Years',
                'languages' => 'English, Indonesian, Japanese (Conversational)',
                'service_area' => 'All Bali (Seminyak, Canggu, Uluwatu, Nusa Dua, Sanur)',
                'phone' => '+62 812-3456-7892',
                'status' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Nyoman Sugiartha',
                'slug' => 'nyoman-sugiartha',
                'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=700&q=80',
                'short_bio' => 'Energetic island explorer and family-friendly driver who loves adventure tours.',
                'description' => "Hello travelers! I am Nyoman Sugiartha. I have 6 years of experience driving families and adventure seekers across Bali and managing island crossings to Nusa Penida.\n\nI am very patient with kids and elderly travelers, and always happy to adjust the route according to your family's pace.",
                'experience' => '6+ Years',
                'languages' => 'English, Indonesian',
                'service_area' => 'All Bali & Nusa Penida Island Coordination',
                'phone' => '+62 812-3456-7893',
                'status' => true,
                'sort_order' => 4,
            ],
        ];

        $drivers = [];
        foreach ($driversData as $d) {
            $drivers[] = Driver::updateOrCreate(['slug' => $d['slug']], $d);
        }

        // 4. Vehicles
        $vehiclesData = [
            [
                'name' => 'Toyota Avanza',
                'slug' => 'toyota-avanza',
                'type' => 'Compact MPV',
                'capacity' => 6,
                'luggage_capacity' => 2,
                'photo' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=900&q=80',
                'description' => "The quintessential Bali travel car. The Toyota Avanza provides nimble agility through Bali's narrow town roads and village shortcuts while maintaining excellent fuel efficiency and comfortable air conditioning for couples and small families.",
                'facilities' => "Dual Air Conditioning\nComfortable Fabric Seats\nUSB Phone Charging Ports\nBluetooth Audio System\nChilled Bottled Mineral Water\nTissue & Hand Sanitizer",
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Toyota Innova Reborn',
                'slug' => 'toyota-innova-reborn',
                'type' => 'Premium MPV',
                'capacity' => 7,
                'luggage_capacity' => 3,
                'photo' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=900&q=80',
                'description' => "Our most popular vehicle for long day trips and highland roads. The Innova Reborn features generous captain-style seating, superior shock absorption, and whisper-quiet cabin insulation for the ultimate relaxed road trip.",
                'facilities' => "Triple Blower Automatic Climate Control\nErgonomic Reclining Seats\nSpacious Legroom & Headroom\nFast-charging USB & Type-C Outlets\nRear Seat Privacy Glass\nComplimentary Bottled Water\nUmbrellas on Board",
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Toyota HiAce Commuter',
                'slug' => 'toyota-hiace-commuter',
                'type' => 'Large Minibus',
                'capacity' => 14,
                'luggage_capacity' => 6,
                'photo' => 'https://images.unsplash.com/photo-1570125909232-eb263c188f7e?auto=format&fit=crop&w=900&q=80',
                'description' => "The premier choice for large families, friend groups, wedding guests, or corporate retreats. Everyone travels together in comfort with wide aisles, high ceilings, and ample luggage space in the rear.",
                'facilities' => "High-output Overhead AC for All Rows\nIndividual Reclining Seats\nWide Step Board for Easy Ingress\nDedicated Rear Luggage Trunk\nMicrophone Available for Tour Guiding\nComplimentary Mineral Water",
                'status' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Mitsubishi Xpander',
                'slug' => 'mitsubishi-xpander',
                'type' => 'Modern Crossover MPV',
                'capacity' => 6,
                'luggage_capacity' => 2,
                'photo' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=900&q=80',
                'description' => "Contemporary styling with generous ground clearance, ideal for both city cruising in Seminyak and coastal tracks around Uluwatu. Clean, quiet, and very comfortable.",
                'facilities' => "Power AC System\nTouchscreen Audio with Apple CarPlay / Android Auto\nMultiple USB Charging Sockets\nFoldable Rear Seats for Extra Cargo\nComplimentary Bottled Water",
                'status' => true,
                'sort_order' => 4,
            ],
        ];

        $vehicles = [];
        foreach ($vehiclesData as $v) {
            $createdVehicle = Vehicle::updateOrCreate(['slug' => $v['slug']], $v);
            $vehicles[] = $createdVehicle;

            // Seed 2 gallery images per vehicle
            VehicleImage::updateOrCreate(
                ['vehicle_id' => $createdVehicle->id, 'sort_order' => 1],
                ['image_path' => $createdVehicle->photo, 'alt_text' => $createdVehicle->name . ' exterior']
            );
            VehicleImage::updateOrCreate(
                ['vehicle_id' => $createdVehicle->id, 'sort_order' => 2],
                ['image_path' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=900&q=80', 'alt_text' => $createdVehicle->name . ' interior seating']
            );
        }

        // 5. Activities
        $activitiesData = [
            [
                'name' => 'Ayung River White Water Rafting',
                'slug' => 'ayung-river-rafting',
                'location' => 'Ubud, Gianyar',
                'duration' => '2.5 Hours',
                'price' => 450000,
                'price_label' => 'per person',
                'short_description' => 'Exciting 12km white water rafting adventure along the lush Ayung River rainforest valley with professional river guides.',
                'description' => "Experience the thrill of navigating Class II and III rapids along Bali's longest river! The Ayung River rafting course winds through untouched tropical jungle, dramatic river valleys, stone carvings, and cascading waterfalls.\n\nSuitable for beginners, children (from 7 years), and experienced adventurers alike. All safety equipment, certified instructors, hot shower facilities, and an Indonesian buffet lunch are provided at the end of the run.",
                'image' => 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=900&q=80',
                'status' => true,
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Mount Batur Sunrise Trekking',
                'slug' => 'mount-batur-sunrise-trekking',
                'location' => 'Kintamani, Bangli',
                'duration' => '5 Hours',
                'price' => 550000,
                'price_label' => 'per person',
                'short_description' => 'Hike an active volcano in the early morning darkness to witness an unforgettable golden sunrise above the sea of clouds.',
                'description' => "Begin your trek at 03:30 AM with certified local mountain guides as you climb through volcanic terrain toward the 1,717m summit of Mount Batur.\n\nAt the crater rim, savor hot coffee or tea and eggs steamed over natural volcanic steam vents while looking out across Lake Batur and neighboring Mount Abang and Mount Rinjani in the distance. A truly bucket-list Bali experience.",
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80',
                'status' => true,
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Ubud ATV Quad Bike Adventure',
                'slug' => 'ubud-atv-quad-bike-adventure',
                'location' => 'Payangan, Ubud',
                'duration' => '2 Hours',
                'price' => 500000,
                'price_label' => 'per person',
                'short_description' => 'Conquer muddy off-road tracks, bamboo forests, river crossings, and tunnel caves aboard a powerful 250cc all-terrain bike.',
                'description' => "Unleash your inner adventurer on a guided ATV journey through the untamed Balinese countryside! Drive through traditional villages, dense bamboo groves, muddy ditches, waterfall splash zones, and dark tunnel caves.\n\nBoth single and tandem bikes are available with full safety orientation, boots, helmets, and post-ride locker and shower amenities.",
                'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=900&q=80',
                'status' => true,
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Nusa Penida Manta Ray Snorkeling',
                'slug' => 'nusa-penida-manta-ray-snorkeling',
                'location' => 'Nusa Penida',
                'duration' => '3 Hours',
                'price' => 400000,
                'price_label' => 'per person',
                'short_description' => 'Swim with majestic ocean manta rays in their natural feeding grounds at Manta Point and explore vibrant coral reefs.',
                'description' => "Take a traditional motorized outrigger boat to Nusa Penida's premier snorkeling spots: Manta Bay / Manta Point, Crystal Bay, and Gamat Bay. Witness graceful giant manta rays gliding effortlessly in the azure waters.\n\nIncludes snorkeling gear (mask, snorkel, fins, life vest), boat captain, and underwater photos when conditions permit.",
                'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=900&q=80',
                'status' => true,
                'featured' => false,
                'sort_order' => 4,
            ],
        ];

        $activities = [];
        foreach ($activitiesData as $a) {
            $activities[] = Activity::updateOrCreate(['slug' => $a['slug']], $a);
        }

        // 6. Trips
        $tripsData = [
            [
                'name' => 'Ubud Cultural & Waterfall Tour',
                'slug' => 'ubud-cultural-and-waterfall-tour',
                'category' => 'Cultural & Nature',
                'location' => 'Ubud & Central Bali',
                'duration' => '10 Hours',
                'price' => 650000,
                'price_label' => 'per car (up to 5 persons)',
                'hero_image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1200&q=80',
                'short_description' => "Immerse in Bali's artistic and spiritual heart. Discover ancient water temples, playful monkeys in sacred forests, and sweeping emerald rice terraces.",
                'description' => "The quintessential day tour for first-time visitors and culture enthusiasts. Ubud is celebrated worldwide as the spiritual and creative epicentre of Bali.\n\nOur private driver will pick you up directly at your villa or hotel lobby. We begin by visiting the sacred springs of Tirta Empul where locals partake in traditional purification rituals. Next, wander the lush trails of Tegallalang Rice Terraces, explore Ubud Sacred Monkey Forest, and cool down beside the thundering waters of Tegenungan Waterfall.\n\nThe schedule is completely flexible to your pace with ample time for lunch overlooking the valley.",
                'status' => true,
                'featured' => true,
                'sort_order' => 1,
                'destinations' => [
                    ['name' => 'Tegenungan Waterfall', 'description' => 'A dramatic waterfall set in a dense tropical ravine with safe shallow swimming pools and scenic viewpoints.', 'image' => 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=600&q=80', 'sort_order' => 1],
                    ['name' => 'Sacred Monkey Forest Sanctuary', 'description' => 'A sacred natural forest sanctuary home to over 1,000 playful Balinese long-tailed macaques and moss-draped ancient temples.', 'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80', 'sort_order' => 2],
                    ['name' => 'Tegallalang Rice Terrace', 'description' => 'World-famous emerald green rice paddies carved along steep hillsides, demonstrating the ancient Subak irrigation system.', 'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=600&q=80', 'sort_order' => 3],
                    ['name' => 'Tirta Empul Holy Water Temple', 'description' => 'An active 10th-century water temple where holy spring waters flow into stone bathing pools for sacred spiritual cleansing.', 'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=600&q=80', 'sort_order' => 4],
                ],
                'itineraries' => [
                    ['time_label' => '08:30 AM', 'title' => 'Hotel / Villa Pickup', 'description' => 'Your driver arrives at your accommodation with a clean, air-conditioned vehicle.', 'sort_order' => 1],
                    ['time_label' => '09:30 AM', 'title' => 'Tegenungan Waterfall', 'description' => 'Walk down the shaded stone stairs to enjoy morning freshness and photo opportunities.', 'sort_order' => 2],
                    ['time_label' => '11:00 AM', 'title' => 'Sacred Monkey Forest Ubud', 'description' => 'Stroll through the shaded forest paths and ancient stone dragon bridges.', 'sort_order' => 3],
                    ['time_label' => '12:45 PM', 'title' => 'Lunch Overlooking the Valley', 'description' => 'Stop at a recommended local or international cafe with scenic jungle views (meal at personal expense).', 'sort_order' => 4],
                    ['time_label' => '02:00 PM', 'title' => 'Tegallalang Rice Terraces & Swing', 'description' => 'Explore the tiered rice paddies and optional jungle swing overlooking the palms.', 'sort_order' => 5],
                    ['time_label' => '03:45 PM', 'title' => 'Tirta Empul Purification Temple', 'description' => 'Discover the natural holy spring bubbling up from the earth within the temple courtyard.', 'sort_order' => 6],
                    ['time_label' => '05:30 PM', 'title' => 'Return Journey to Hotel', 'description' => 'Relax in comfort as your driver brings you back safely to your accommodation.', 'sort_order' => 7],
                ],
                'inclusions' => [
                    ['type' => 'included', 'description' => 'Private air-conditioned vehicle for up to 10 hours', 'sort_order' => 1],
                    ['type' => 'included', 'description' => 'Professional, licensed English-speaking Balinese driver', 'sort_order' => 2],
                    ['type' => 'included', 'description' => 'All vehicle fuel / petrol and parking fees', 'sort_order' => 3],
                    ['type' => 'included', 'description' => 'Chilled bottled mineral water', 'sort_order' => 4],
                    ['type' => 'not_included', 'description' => 'Entrance tickets to temples and attractions (payable on-site)', 'sort_order' => 5],
                    ['type' => 'not_included', 'description' => 'Lunch, dinner, and personal shopping expenses', 'sort_order' => 6],
                    ['type' => 'not_included', 'description' => 'Optional activity fees (e.g. jungle swing, coffee tasting)', 'sort_order' => 7],
                ],
                'activities_slugs' => ['ayung-river-rafting', 'ubud-atv-quad-bike-adventure'],
            ],
            [
                'name' => 'East Bali Gateway — Lempuyang & Water Palaces',
                'slug' => 'east-bali-lempuyang-and-water-palaces',
                'category' => 'Scenic & Heritage',
                'location' => 'East Bali & Karangasem',
                'duration' => '11 Hours',
                'price' => 750000,
                'price_label' => 'per car (up to 5 persons)',
                'hero_image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Gaze through the iconic Gates of Heaven with majestic Mount Agung as your backdrop, followed by royal Balinese water palaces.',
                'description' => "Journey to Karangasem in eastern Bali, an area known for untouched coastlines, majestic royal palaces, and sacred mountain shrines.\n\nEarly morning departure ensures you reach Pura Lempuyang Luhur to experience the world-famous reflection through the candi bentar gates framing Mount Agung. Continue to Tirta Gangga, an exquisite royal water labyrinth filled with stone lotus stepping stones and giant golden koi fish, before concluding at Taman Ujung Water Palace.",
                'status' => true,
                'featured' => true,
                'sort_order' => 2,
                'destinations' => [
                    ['name' => 'Lempuyang Temple (Gates of Heaven)', 'description' => 'One of Bali’s oldest and most sacred mountain sanctuaries offering unmatched vistas of Mount Agung.', 'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=600&q=80', 'sort_order' => 1],
                    ['name' => 'Tirta Gangga Water Palace', 'description' => 'A royal water retreat built in 1946 featuring stepped pools, ornate stone fountain towers, and koi ponds.', 'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=600&q=80', 'sort_order' => 2],
                    ['name' => 'Taman Ujung Sukasada Palace', 'description' => 'A sprawling historic palace surrounded by large ponds, bridges, and views stretching out to the Lombok Strait.', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80', 'sort_order' => 3],
                ],
                'itineraries' => [
                    ['time_label' => '05:30 AM', 'title' => 'Early Hotel Pickup', 'description' => 'Early departure to beat the midday heat and traffic to East Bali.', 'sort_order' => 1],
                    ['time_label' => '07:30 AM', 'title' => 'Lempuyang Temple Gates', 'description' => 'Receive temple number and photograph the stunning reflection of Mount Agung.', 'sort_order' => 2],
                    ['time_label' => '11:00 AM', 'title' => 'Tirta Gangga Water Palace', 'description' => 'Walk across the stone pedestals and feed the friendly giant koi fish.', 'sort_order' => 3],
                    ['time_label' => '12:45 PM', 'title' => 'Lunch with Rice Terrace Views', 'description' => 'Authentic Balinese culinary stop in Karangasem.', 'sort_order' => 4],
                    ['time_label' => '02:00 PM', 'title' => 'Taman Ujung Water Palace', 'description' => 'Explore the grand brick pavilion and European-Balinese architecture.', 'sort_order' => 5],
                    ['time_label' => '04:30 PM', 'title' => 'Return Journey', 'description' => 'Scenic coastal drive back to your hotel.', 'sort_order' => 6],
                ],
                'inclusions' => [
                    ['type' => 'included', 'description' => 'Private car with air conditioning up to 11 hours', 'sort_order' => 1],
                    ['type' => 'included', 'description' => 'Dedicated local driver & fuel', 'sort_order' => 2],
                    ['type' => 'included', 'description' => 'Parking and highway toll fees', 'sort_order' => 3],
                    ['type' => 'included', 'description' => 'Chilled mineral water', 'sort_order' => 4],
                    ['type' => 'not_included', 'description' => 'Lempuyang shuttle bus and entrance tickets', 'sort_order' => 5],
                    ['type' => 'not_included', 'description' => 'Meals and drinks', 'sort_order' => 6],
                ],
                'activities_slugs' => [],
            ],
            [
                'name' => 'Nusa Penida Island Discovery Tour',
                'slug' => 'nusa-penida-island-discovery-tour',
                'category' => 'Island Adventure',
                'location' => 'Nusa Penida Island',
                'duration' => 'Full Day',
                'price' => 950000,
                'price_label' => 'per person (min 2 persons)',
                'hero_image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Cross the Badung Strait to Nusa Penida and marvel at the famous T-Rex cliff at Kelingking Beach, Angel’s Billabong, and Broken Beach.',
                'description' => "Discover the raw, dramatic limestone cliffs and turquoise waters of Nusa Penida. Our package includes private hotel transfer to Sanur Harbour, round-trip fast boat tickets, and a dedicated private driver waiting for you on the island.",
                'status' => true,
                'featured' => true,
                'sort_order' => 3,
                'destinations' => [
                    ['name' => 'Kelingking Beach (T-Rex Cliff)', 'description' => 'Iconic limestone headland resembling a Tyrannosaurus Rex overlooking sparkling turquoise waters.', 'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=600&q=80', 'sort_order' => 1],
                    ['name' => 'Broken Beach (Pasih Uug)', 'description' => 'A unique geological formation with a natural limestone archway letting ocean tides rush into a circular bay.', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80', 'sort_order' => 2],
                    ['name' => 'Angel’s Billabong', 'description' => 'A natural crystal-clear infinity tidal pool formed within the rugged volcanic rock shelf.', 'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=600&q=80', 'sort_order' => 3],
                    ['name' => 'Crystal Bay', 'description' => 'A serene white-sand bay flanked by coconut palms, ideal for swimming and unwinding before the fast boat ride home.', 'image' => 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=600&q=80', 'sort_order' => 4],
                ],
                'itineraries' => [
                    ['time_label' => '06:30 AM', 'title' => 'Hotel Pickup in Bali', 'description' => 'Transfer to Sanur Harbour for fast boat boarding.', 'sort_order' => 1],
                    ['time_label' => '07:45 AM', 'title' => 'Fast Boat Crossing', 'description' => 'Speedboat journey across the strait to Nusa Penida (approx. 40 minutes).', 'sort_order' => 2],
                    ['time_label' => '09:00 AM', 'title' => 'Kelingking Beach Viewpoint', 'description' => 'Arrive at the famous T-Rex cliff viewpoint for breathtaking panoramic photos.', 'sort_order' => 3],
                    ['time_label' => '11:30 AM', 'title' => 'Broken Beach & Angel’s Billabong', 'description' => 'Witness natural ocean arches and emerald sea lagoons.', 'sort_order' => 4],
                    ['time_label' => '01:00 PM', 'title' => 'Lunch at Island Restaurant', 'description' => 'Indonesian lunch included in package.', 'sort_order' => 5],
                    ['time_label' => '02:30 PM', 'title' => 'Crystal Bay Beach', 'description' => 'Relax under the palm trees and swim in calm water.', 'sort_order' => 6],
                    ['time_label' => '04:00 PM', 'title' => 'Fast Boat Return to Sanur', 'description' => 'Board return boat and transfer back to hotel.', 'sort_order' => 7],
                ],
                'inclusions' => [
                    ['type' => 'included', 'description' => 'Round-trip private hotel transfers in Bali', 'sort_order' => 1],
                    ['type' => 'included', 'description' => 'Return fast boat tickets (Sanur - Nusa Penida - Sanur)', 'sort_order' => 2],
                    ['type' => 'included', 'description' => 'Private air-conditioned car & driver in Nusa Penida', 'sort_order' => 3],
                    ['type' => 'included', 'description' => 'All island entrance fees and parking', 'sort_order' => 4],
                    ['type' => 'included', 'description' => 'Lunch at local restaurant and bottled water', 'sort_order' => 5],
                    ['type' => 'not_included', 'description' => 'Personal shopping and optional snorkeling boat rental', 'sort_order' => 6],
                ],
                'activities_slugs' => ['nusa-penida-manta-ray-snorkeling'],
            ],
            [
                'name' => 'Bedugul Highlands & Tanah Lot Sunset',
                'slug' => 'bedugul-highlands-and-tanah-lot-sunset',
                'category' => 'Highland & Sunset',
                'location' => 'Bedugul & Tabanan',
                'duration' => '10 Hours',
                'price' => 700000,
                'price_label' => 'per car (up to 5 persons)',
                'hero_image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Cool off in the misty mountain lake of Ulun Danu Beratan, explore UNESCO Jatiluwih terraces, and watch sunset at Tanah Lot.',
                'description' => "Escape the coastal warmth into Bali's misty central highlands. This full-day journey takes you along scenic mountain switchbacks to Lake Beratan, where the 17th-century temple appears to float gracefully upon the water surface.\n\nNext, walk through the UNESCO World Heritage Jatiluwih Rice Terraces covering thousands of hectares, before heading to the Indian Ocean coast for the dramatic sunset over Tanah Lot Sea Temple.",
                'status' => true,
                'featured' => false,
                'sort_order' => 4,
                'destinations' => [
                    ['name' => 'Ulun Danu Beratan Temple', 'description' => 'The iconic floating temple dedicated to Dewi Danu, goddess of the lake, nestled in cool volcanic mountains.', 'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80', 'sort_order' => 1],
                    ['name' => 'Jatiluwih Rice Terraces (UNESCO)', 'description' => 'Massive, sweeping amphitheater of green rice fields preserved under Balinese agricultural heritage.', 'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=600&q=80', 'sort_order' => 2],
                    ['name' => 'Tanah Lot Sea Temple', 'description' => 'Ancient Hindu shrine perched on an offshore rocky outcrop with waves crashing at sunset.', 'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=600&q=80', 'sort_order' => 3],
                ],
                'itineraries' => [
                    ['time_label' => '08:30 AM', 'title' => 'Hotel Pickup', 'description' => 'Pick up from your accommodation.', 'sort_order' => 1],
                    ['time_label' => '10:30 AM', 'title' => 'Ulun Danu Beratan Temple', 'description' => 'Enjoy the cool mountain climate and photograph the iconic floating shrine.', 'sort_order' => 2],
                    ['time_label' => '12:30 PM', 'title' => 'Jatiluwih Rice Terraces & Lunch', 'description' => 'Lunch with panoramic views of thousands of green terraces.', 'sort_order' => 3],
                    ['time_label' => '03:30 PM', 'title' => 'Journey to the Coast', 'description' => 'Drive through traditional Tabanan villages toward Tanah Lot.', 'sort_order' => 4],
                    ['time_label' => '05:00 PM', 'title' => 'Tanah Lot Temple Sunset', 'description' => 'Watch the golden sunset behind the silhouette of the sea temple.', 'sort_order' => 5],
                    ['time_label' => '06:30 PM', 'title' => 'Return Transfer', 'description' => 'Comfortable drive back to hotel.', 'sort_order' => 6],
                ],
                'inclusions' => [
                    ['type' => 'included', 'description' => 'Private air-conditioned car up to 10 hours', 'sort_order' => 1],
                    ['type' => 'included', 'description' => 'English-speaking Balinese driver', 'sort_order' => 2],
                    ['type' => 'included', 'description' => 'Fuel & parking fees', 'sort_order' => 3],
                    ['type' => 'included', 'description' => 'Mineral water bottles', 'sort_order' => 4],
                    ['type' => 'not_included', 'description' => 'Temple entrance fees', 'sort_order' => 5],
                    ['type' => 'not_included', 'description' => 'Meals and drinks', 'sort_order' => 6],
                ],
                'activities_slugs' => [],
            ],
            [
                'name' => 'Uluwatu Cliff & Jimbaran Sunset Seafood',
                'slug' => 'uluwatu-cliff-and-jimbaran-sunset-seafood',
                'category' => 'Sunset & Beach',
                'location' => 'South Bali Peninsula',
                'duration' => '8 Hours',
                'price' => 600000,
                'price_label' => 'per car (up to 5 persons)',
                'hero_image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Explore white sand beaches of Bukit Peninsula, watch the clifftop Kecak Fire Dance at Uluwatu, and dine on Jimbaran beach.',
                'description' => "Experience the best of southern Bali's dramatic limestone cliffs and golden beaches. Relax at hidden cove beaches like Padang Padang or Melasti, admire the 70-meter vertical drop at Uluwatu Temple, and conclude your evening with grilled seafood by candlelight on the soft sands of Jimbaran Bay.",
                'status' => true,
                'featured' => false,
                'sort_order' => 5,
                'destinations' => [
                    ['name' => 'Padang Padang Beach', 'description' => 'Famous surf beach accessed through a natural limestone crevice with calm turquoise swimming waters.', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80', 'sort_order' => 1],
                    ['name' => 'Uluwatu Temple & Clifftop Walk', 'description' => 'Spectacular sea temple perched 70 meters directly above crashing Indian Ocean waves.', 'image' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=600&q=80', 'sort_order' => 2],
                    ['name' => 'Jimbaran Bay Candlelight Dinner', 'description' => 'Famous crescent bay where open-air tables are set directly on the beach for freshly grilled Balinese seafood.', 'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80', 'sort_order' => 3],
                ],
                'itineraries' => [
                    ['time_label' => '01:00 PM', 'title' => 'Afternoon Pickup', 'description' => 'Hotel pickup for a relaxed afternoon coastal exploration.', 'sort_order' => 1],
                    ['time_label' => '02:00 PM', 'title' => 'Padang Padang Beach', 'description' => 'Swim and relax on the white sands of the Bukit Peninsula.', 'sort_order' => 2],
                    ['time_label' => '04:30 PM', 'title' => 'Uluwatu Temple Clifftop Walk', 'description' => 'Stroll along the cliff path and watch the waves below.', 'sort_order' => 3],
                    ['time_label' => '06:00 PM', 'title' => 'Kecak & Fire Dance at Sunset', 'description' => 'Watch the world-renowned chanting chorus as the sun sinks into the sea.', 'sort_order' => 4],
                    ['time_label' => '07:30 PM', 'title' => 'Jimbaran Bay Seafood Dinner', 'description' => 'Dine with your feet in the sand under the stars.', 'sort_order' => 5],
                    ['time_label' => '09:00 PM', 'title' => 'Return Transfer', 'description' => 'Safe drive back to your hotel.', 'sort_order' => 6],
                ],
                'inclusions' => [
                    ['type' => 'included', 'description' => 'Private air-conditioned car up to 8 hours', 'sort_order' => 1],
                    ['type' => 'included', 'description' => 'English-speaking driver and petrol', 'sort_order' => 2],
                    ['type' => 'included', 'description' => 'Parking and toll road fees', 'sort_order' => 3],
                    ['type' => 'included', 'description' => 'Cold bottled water', 'sort_order' => 4],
                    ['type' => 'not_included', 'description' => 'Kecak dance ticket and temple entrance', 'sort_order' => 5],
                    ['type' => 'not_included', 'description' => 'Seafood dinner expenses', 'sort_order' => 6],
                ],
                'activities_slugs' => [],
            ],
        ];

        foreach ($tripsData as $tData) {
            $destinations = $tData['destinations'];
            $itineraries = $tData['itineraries'];
            $inclusions = $tData['inclusions'];
            $actSlugs = $tData['activities_slugs'];
            unset($tData['destinations'], $tData['itineraries'], $tData['inclusions'], $tData['activities_slugs']);

            $trip = Trip::updateOrCreate(['slug' => $tData['slug']], $tData);

            // Dest
            TripDestination::where('trip_id', $trip->id)->delete();
            foreach ($destinations as $dest) {
                TripDestination::create(array_merge($dest, ['trip_id' => $trip->id]));
            }

            // Itin
            TripItinerary::where('trip_id', $trip->id)->delete();
            foreach ($itineraries as $itin) {
                TripItinerary::create(array_merge($itin, ['trip_id' => $trip->id]));
            }

            // Inc
            TripInclusion::where('trip_id', $trip->id)->delete();
            foreach ($inclusions as $inc) {
                TripInclusion::create(array_merge($inc, ['trip_id' => $trip->id]));
            }

            // Attach activities
            $actIds = Activity::whereIn('slug', $actSlugs)->pluck('id');
            $trip->activities()->sync($actIds);

            // Attach vehicles & drivers
            $trip->vehicles()->sync(Vehicle::pluck('id'));
            $trip->drivers()->sync(Driver::pluck('id'));
        }

        // 7. Reviews (Realistic placeholder data clearly marked for dev)
        $firstTrip = Trip::first();
        $wayan = Driver::where('slug', 'wayan-sukadana')->first();
        $ketut = Driver::where('slug', 'ketut-artawan')->first();
        $made = Driver::where('slug', 'made-darma')->first();

        $reviewsData = [
            [
                'customer_name' => 'Sarah & Mark Jenkins',
                'country' => 'Australia',
                'rating' => 5,
                'review' => 'Wayan was the best driver we could have asked for in Bali! Extremely polite, always on time, and knew all the best viewpoints without tourist crowds. Booking via WhatsApp was effortless.',
                'trip_id' => $firstTrip ? $firstTrip->id : null,
                'driver_id' => $wayan ? $wayan->id : null,
                'status' => true,
                'featured' => true,
            ],
            [
                'customer_name' => 'David & Emily Chen',
                'country' => 'Singapore',
                'rating' => 5,
                'review' => 'Clean car, icy cold air conditioning, and Ketut is a very safe driver. He made our day trip to Bedugul and Tanah Lot completely stress-free with our toddler. Highly recommended!',
                'trip_id' => null,
                'driver_id' => $ketut ? $ketut->id : null,
                'status' => true,
                'featured' => true,
            ],
            [
                'customer_name' => 'Elena Rostova',
                'country' => 'Germany',
                'rating' => 5,
                'review' => 'We booked the East Bali tour for our honeymoon. Made arrived promptly with a sparkling clean Innova, gave us genuine local insights, and took gorgeous photos of us at Tirta Gangga. 10/10!',
                'trip_id' => null,
                'driver_id' => $made ? $made->id : null,
                'status' => true,
                'featured' => true,
            ],
            [
                'customer_name' => 'Liam & Sophie O’Connor',
                'country' => 'United Kingdom',
                'rating' => 5,
                'review' => 'Fantastic private driver service! Transparent prices without any hidden surprises or pushy souvenir stops. We felt genuinely cared for throughout our 10-day holiday in Bali.',
                'trip_id' => $firstTrip ? $firstTrip->id : null,
                'driver_id' => $wayan ? $wayan->id : null,
                'status' => true,
                'featured' => true,
            ],
        ];

        foreach ($reviewsData as $r) {
            Review::create($r);
        }
    }
}
