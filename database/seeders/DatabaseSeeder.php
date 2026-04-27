<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Team;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users first (including admin)
        $this->call([
            UserSeeder::class,
            PageContentSeeder::class,
        ]);

        // Get the admin user
        $user = User::where('email', 'admin@lawfirm.com')->first();

        // Create sample services (using firstOrCreate to avoid duplicates)
        Service::firstOrCreate(
            ['slug' => 'corporate-law'],
            [
                'title' => 'Hukum Korporasi',
                'icon' => 'fas fa-building',
                'short_description' => 'Layanan hukum komprehensif untuk bisnis',
                'description' => 'Layanan hukum komprehensif bagi bisnis termasuk penyusunan kontrak, kepatuhan, dan tata kelola perusahaan.',
                'is_active' => true,
                'order' => 1,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'criminal-defense'],
            [
                'title' => 'Pembelaan Pidana',
                'icon' => 'fas fa-gavel',
                'short_description' => 'Pengacara pembela pidana berpengalaman',
                'description' => 'Pengacara pembela pidana berpengalaman yang memberikan representasi kuat dalam semua masalah pidana.',
                'is_active' => true,
                'order' => 2,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'family-law'],
            [
                'title' => 'Hukum Keluarga',
                'icon' => 'fas fa-users',
                'short_description' => 'Layanan hukum keluarga yang empatik',
                'description' => 'Layanan hukum keluarga yang empatik termasuk perceraian, hak asuh anak, dan proses adopsi.',
                'is_active' => true,
                'order' => 3,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'real-estate-law'],
            [
                'title' => 'Hukum Properti',
                'icon' => 'fas fa-home',
                'short_description' => 'Panduan ahli dalam transaksi properti',
                'description' => 'Panduan ahli dalam transaksi properti, penyewaan, dan sengketa real estat.',
                'is_active' => true,
                'order' => 4,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'immigration-law'],
            [
                'title' => 'Hukum Imigrasi',
                'icon' => 'fas fa-passport',
                'short_description' => 'Layanan imigrasi profesional',
                'description' => 'Layanan imigrasi profesional untuk visa, kewarganegaraan, dan pembelaan deportasi.',
                'is_active' => true,
                'order' => 5,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'personal-injury'],
            [
                'title' => 'Cedera Pribadi',
                'icon' => 'fas fa-ambulance',
                'short_description' => 'Representasi agresif untuk klaim cedera',
                'description' => 'Representasi agresif untuk klaim cedera pribadi dan perlindungan bagi korban kecelakaan.',
                'is_active' => true,
                'order' => 6,
            ]
        );

        // Create sample team members
        Team::firstOrCreate(
            ['email' => 'john@lawfirm.com'],
            [
                'name' => 'John Smith',
                'position' => 'Senior Partner',
                'specialization' => 'Corporate Law',
                'photo' => 'team-1.jpg',
                'bio' => 'John has over 20 years of experience in corporate law and has successfully handled numerous high-profile cases.',
                'phone' => '(555) 123-4567',
                'order' => 1,
                'is_active' => true,
            ]
        );

        Team::firstOrCreate(
            ['email' => 'sarah@lawfirm.com'],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Associate Attorney',
                'specialization' => 'Family Law, Criminal Defense',
                'photo' => 'team-2.jpg',
                'bio' => 'Sarah specializes in family law and criminal defense, bringing fresh perspectives to complex legal matters.',
                'phone' => '(555) 123-4568',
                'order' => 2,
                'is_active' => true,
            ]
        );

        Team::firstOrCreate(
            ['email' => 'michael@lawfirm.com'],
            [
                'name' => 'Michael Davis',
                'position' => 'Legal Counsel',
                'specialization' => 'Real Estate Law, Immigration',
                'photo' => 'team-3.jpg',
                'bio' => 'Michael focuses on real estate law and immigration matters, providing comprehensive legal solutions.',
                'phone' => '(555) 123-4569',
                'order' => 3,
                'is_active' => true,
            ]
        );

        Team::firstOrCreate(
            ['email' => 'emily@lawfirm.com'],
            [
                'name' => 'Emily Chen',
                'position' => 'Paralegal',
                'specialization' => 'Legal Support',
                'photo' => 'team-4.jpg',
                'bio' => 'Emily provides essential support in case preparation and client communication with exceptional attention to detail.',
                'phone' => '(555) 123-4570',
                'order' => 4,
                'is_active' => true,
            ]
        );

        // Create sample articles
        Article::firstOrCreate(
            ['slug' => 'understanding-corporate-compliance'],
            [
                'title' => 'Understanding Corporate Compliance',
                'category' => 'Corporate Law',
                'featured_image' => 'article-1.jpg',
                'excerpt' => 'Learn about the essential aspects of corporate compliance and how to maintain legal standards in your business operations.',
                'content' => 'Corporate compliance is crucial for businesses to operate legally and ethically. This article explores key compliance requirements and best practices.',
                'meta_description' => 'Comprehensive guide to corporate compliance requirements and best practices for businesses.',
                'meta_keywords' => 'corporate compliance, business law, legal requirements',
                'user_id' => $user->id,
                'is_published' => true,
                'views' => 150,
                'published_at' => now(),
            ]
        );

        Article::firstOrCreate(
            ['slug' => 'recent-changes-immigration-law'],
            [
                'title' => 'Recent Changes in Immigration Law',
                'category' => 'Immigration Law',
                'featured_image' => 'article-2.jpg',
                'excerpt' => 'Stay up-to-date with the most recent developments in immigration law and their potential impact on your situation.',
                'content' => 'The immigration landscape is constantly evolving. Stay informed about the latest changes and their implications for individuals and businesses.',
                'meta_description' => 'Latest updates and changes in immigration law affecting individuals and businesses.',
                'meta_keywords' => 'immigration law, visa changes, legal updates',
                'user_id' => $user->id,
                'is_published' => true,
                'views' => 120,
                'published_at' => now()->subDays(7),
            ]
        );

        Article::firstOrCreate(
            ['slug' => 'protecting-intellectual-property'],
            [
                'title' => 'Protecting Your Intellectual Property',
                'category' => 'Intellectual Property',
                'featured_image' => 'article-3.jpg',
                'excerpt' => 'Discover the importance of intellectual property protection and the legal tools available to safeguard your innovations.',
                'content' => 'Intellectual property protection is vital for creators and businesses. Learn about patents, trademarks, and copyrights.',
                'meta_description' => 'Essential guide to protecting intellectual property including patents, trademarks, and copyrights.',
                'meta_keywords' => 'intellectual property, patents, trademarks, copyrights',
                'user_id' => $user->id,
                'is_published' => true,
                'views' => 95,
                'published_at' => now()->subDays(14),
            ]
        );

        // Create sample testimonials
        Testimonial::firstOrCreate(
            ['client_name' => 'Robert Wilson'],
            [
                'client_position' => 'CEO, TechCorp',
                'client_photo' => 'client-1.jpg',
                'testimonial' => 'The legal team provided exceptional service during our merger. Their expertise and attention to detail were invaluable.',
                'rating' => 5,
                'is_active' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['client_name' => 'Maria Garcia'],
            [
                'client_position' => 'Small Business Owner',
                'client_photo' => 'client-2.jpg',
                'testimonial' => 'I was impressed by their professionalism and clear communication throughout my case. Highly recommended.',
                'rating' => 5,
                'is_active' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['client_name' => 'David Thompson'],
            [
                'client_position' => 'Individual Client',
                'client_photo' => 'client-3.jpg',
                'testimonial' => 'They handled my personal injury case with great care and achieved an excellent outcome. Thank you!',
                'rating' => 5,
                'is_active' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['client_name' => 'Lisa Anderson'],
            [
                'client_position' => 'Real Estate Developer',
                'client_photo' => 'client-4.jpg',
                'testimonial' => 'Outstanding legal support for our property development projects. Reliable and knowledgeable team.',
                'rating' => 5,
                'is_active' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['client_name' => 'James Lee'],
            [
                'client_position' => 'Immigration Client',
                'client_photo' => 'client-5.jpg',
                'testimonial' => 'Their immigration expertise helped me navigate a complex process successfully. Grateful for their guidance.',
                'rating' => 5,
                'is_active' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['client_name' => 'Patricia Moore'],
            [
                'client_position' => 'Family Law Client',
                'client_photo' => 'client-6.jpg',
                'testimonial' => 'Compassionate and effective representation during a difficult time. They made the process as smooth as possible.',
                'rating' => 5,
                'is_active' => true,
            ]
        );
    }
}
