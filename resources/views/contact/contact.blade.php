@extends('layouts.app')

@section('content')
    <!-- Hero Section - Enhanced -->
    <section class="relative py-32 overflow-hidden hero-pattern bg-[#FDFBFC]">
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-96 h-96 bg-[#B89A72]/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-72 h-72 bg-[#d4b896]/10 rounded-full blur-3xl animate-float"
                style="animation-delay: 1s;"></div>
            <!-- Floating Elements -->
            <div class="absolute top-1/3 right-1/4 w-4 h-4 bg-[#B89A72]/30 rounded-full float-slow"></div>
            <div class="absolute bottom-1/3 left-1/4 w-5 h-5 bg-[#d4b896]/20 rounded-full float-delayed"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <span class="badge badge-accent mb-6 inline-block holographic">Hubungi Kami</span>
            <h1 class="text-5xl md:text-6xl font-bold text-[#242844] mb-6">
                {!! $contents['contact_hero_title'] !!}
            </h1>
            <p class="mt-4 text-xl text-[#5a5e7a] max-w-3xl mx-auto leading-relaxed">
                {{ $contents['contact_hero_subtitle'] }}
            </p>
        </div>
    </section>

    <!-- Contact Information & Form - Enhanced -->
    <section class="section-padding relative bg-[#F5F3F4]">
        <div class="absolute inset-0 grid-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Contact Information -->
                <div class="reveal-left">
                    <h2 class="text-3xl font-bold text-[#242844] mb-6">{!! $contents['contact_info_title'] !!}</h2>
                    <p class="text-[#5a5e7a] mb-8 leading-relaxed">
                        {{ $contents['contact_info_subtitle'] }}
                    </p>

                    <div class="space-y-6 mb-8">
                        <div class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-[#B89A72]/20 to-[#d4b896]/20 flex items-center justify-center border border-[#B89A72]/30 pulse-ring">
                                <i class="fas fa-map-marker-alt text-[#8a7048]"></i>
                            </div>
                            <div>
                                <h4 class="text-[#242844] font-semibold mb-1">Alamat Kantor</h4>
                                <p class="text-[#5a5e7a] text-sm">123 Legal Avenue, Suite 500<br>New York, NY 10001</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-[#B89A72]/20 to-[#d4b896]/20 flex items-center justify-center border border-[#B89A72]/30 pulse-ring">
                                <i class="fas fa-phone text-[#8a7048]"></i>
                            </div>
                            <div>
                                <h4 class="text-[#242844] font-semibold mb-1">Telepon</h4>
                                <p class="text-[#5a5e7a] text-sm">(555) 123-4567<br>Sen - Jum: 9:00 - 18:00</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-[#B89A72]/20 to-[#d4b896]/20 flex items-center justify-center border border-[#B89A72]/30 pulse-ring">
                                <i class="fas fa-envelope text-[#8a7048]"></i>
                            </div>
                            <div>
                                <h4 class="text-[#242844] font-semibold mb-1">Email</h4>
                                <p class="text-[#5a5e7a] text-sm">info@mvplawfirm.com<br>support@mvplawfirm.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div>
                        <h4 class="text-[#242844] font-semibold mb-4">Ikuti Kami</h4>
                        <div class="flex space-x-3">
                            <a href="#"
                                class="w-10 h-10 rounded-xl bg-[#FDFBFC] flex items-center justify-center hover:bg-[#8a7048]/20 transition-colors border border-[#8a7048]/20">
                                <i class="fab fa-linkedin-in text-[#8a7048]"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-xl bg-[#FDFBFC] flex items-center justify-center hover:bg-[#8a7048]/20 transition-colors border border-[#8a7048]/20">
                                <i class="fab fa-twitter text-[#8a7048]"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-xl bg-[#FDFBFC] flex items-center justify-center hover:bg-[#8a7048]/20 transition-colors border border-[#8a7048]/20">
                                <i class="fab fa-facebook-f text-[#8a7048]"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-xl bg-[#FDFBFC] flex items-center justify-center hover:bg-[#8a7048]/20 transition-colors border border-[#8a7048]/20">
                                <i class="fab fa-instagram text-[#8a7048]"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="reveal-right">
                    <div class="glass rounded-2xl p-8 holographic">
                        <h3 class="text-2xl font-bold text-[#242844] mb-6">Kirim Pesan</h3>

                        @if (session('success'))
                            <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-400 text-green-700">
                                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[#242844] text-sm font-medium mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="input-modern w-full" placeholder="Nama lengkap Anda" required>
                                </div>
                                <div>
                                    <label class="block text-[#242844] text-sm font-medium mb-2">Subjek</label>
                                    <input type="text" name="subject" value="{{ old('subject') }}"
                                        class="input-modern w-full" placeholder="Subjek pesan" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[#242844] text-sm font-medium mb-2">Alamat Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="input-modern w-full"
                                    placeholder="email@example.com" required>
                            </div>
                            <div>
                                <label class="block text-[#242844] text-sm font-medium mb-2">Nomor Telepon</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="input-modern w-full"
                                    placeholder="(555) 123-4567">
                            </div>
                            <div>
                                <label class="block text-[#242844] text-sm font-medium mb-2">Bidang Praktik</label>
                                <select name="practice_area" class="input-modern w-full">
                                    <option value="">Pilih bidang praktik</option>
                                    <option value="corporate" {{ old('practice_area') == 'corporate' ? 'selected' : '' }}>
                                        Hukum Korporasi</option>
                                    <option value="family" {{ old('practice_area') == 'family' ? 'selected' : '' }}>Hukum
                                        Keluarga</option>
                                    <option value="criminal" {{ old('practice_area') == 'criminal' ? 'selected' : '' }}>
                                        Pembelaan Pidana</option>
                                    <option value="realestate"
                                        {{ old('practice_area') == 'realestate' ? 'selected' : '' }}>Real Estat</option>
                                    <option value="personalinjury"
                                        {{ old('practice_area') == 'personalinjury' ? 'selected' : '' }}>Cedera Pribadi
                                    </option>
                                    <option value="immigration"
                                        {{ old('practice_area') == 'immigration' ? 'selected' : '' }}>Imigrasi</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[#242844] text-sm font-medium mb-2">Pesan</label>
                                <textarea name="message" rows="4" class="input-modern w-full" placeholder="Ceritakan kebutuhan hukum Anda..."
                                    required>{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn-primary w-full btn-magnetic">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section - Enhanced -->
    <section class="section-padding relative bg-[#FDFBFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal">
                <h2 class="text-3xl font-bold text-[#242844] mb-4">Kunjungi Kantor Kami</h2>
                <p class="text-[#5a5e7a]">Terletak strategis di pusat kota</p>
            </div>
            <div class="glass rounded-2xl overflow-hidden holographic reveal">
                <div class="h-96 img-placeholder flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-6xl text-[#B89A72]/30 mb-4"></i>
                        <p class="text-[#5a5e7a]">Peta Interaktif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section - Enhanced -->
    <section class="section-padding relative bg-[#F5F3F4]">
        <div class="absolute inset-0 grid-pattern opacity-30"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal">
                <span class="badge badge-accent mb-4 holographic">FAQ</span>
                <h2 class="text-3xl font-bold text-[#242844] mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-[#5a5e7a]">Temukan jawaban untuk pertanyaan umum tentang layanan kami</p>
            </div>

            <div class="space-y-4 stagger-children">
                <div class="glass rounded-xl p-6 holographic reveal">
                    <h4 class="text-[#242844] font-semibold mb-2">Bagaimana cara menjadwalkan konsultasi?</h4>
                    <p class="text-[#5a5e7a] text-sm">Anda dapat menjadwalkan konsultasi dengan mengisi formulir kontak,
                        menelepon kantor kami secara langsung, atau mengirim email kepada kami. Kami menawarkan konsultasi
                        tatap muka dan virtual.</p>
                </div>
                <div class="glass rounded-xl p-6 holographic reveal">
                    <h4 class="text-[#242844] font-semibold mb-2">Apa yang harus saya bawa ke pertemuan pertama?</h4>
                    <p class="text-[#5a5e7a] text-sm">Harap bawa dokumen apa pun yang relevan dengan kasus Anda,
                        identifikasi, dan daftar pertanyaan yang ingin Anda diskusikan. Ini membantu kami memberikan saran
                        yang paling akurat.</p>
                </div>
                <div class="glass rounded-xl p-6 holographic reveal">
                    <h4 class="text-[#242844] font-semibold mb-2">Bagaimana struktur biaya Anda?</h4>
                    <p class="text-[#5a5e7a] text-sm">Struktur biaya kami bervariasi tergantung pada jenis kasus. Kami
                        menawarkan tarif per jam, biaya tetap, dan pengaturan kontingensi. Kami akan membahas semua biaya
                        secara transparan selama konsultasi Anda.</p>
                </div>
                <div class="glass rounded-xl p-6 holographic reveal">
                    <h4 class="text-[#242844] font-semibold mb-2">Apakah Anda menawarkan rencana pembayaran?</h4>
                    <p class="text-[#5a5e7a] text-sm">Ya, kami memahami bahwa layanan hukum dapat menjadi investasi yang
                        signifikan. Kami menawarkan rencana pembayaran fleksibel untuk membantu membuat representasi hukum
                        berkualitas dapat diakses.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
