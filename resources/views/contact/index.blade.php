@extends('layouts.app')

@section('title', 'Contact Us - Ilm e Quran Quran Academy')

@section('content')

<!-- HERO -->
<section class="relative bg-linear-to-r from-[#0a5c36] to-[#0a7c46] text-white py-16 md:py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=1350&q=80"
             class="w-full h-full object-cover" alt="Background">
    </div>

    <div class="container mx-auto px-4 max-w-7xl relative z-10 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Contact Us</h1>
        <p class="text-lg md:text-xl opacity-95">
            We are here to help you with Quran learning.
        </p>
    </div>
</section>

<!-- CONTACT CARDS -->
<section class="container mx-auto px-4 max-w-7xl py-16">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="p-6 shadow rounded text-center">
            <h3 class="font-bold text-xl mb-2">Call Us</h3>
            <p>+92 336 5385030</p>
            <a href="tel:+923365385030" class="text-green-700 font-semibold">Call Now</a>
        </div>

        <div class="p-6 shadow rounded text-center">
            <h3 class="font-bold text-xl mb-2">Email</h3>
            <p>abdulwaheed3334@gmail.com</p>
            <a href="mailto:abdulwaheed3334@gmail.com" class="text-green-700 font-semibold">Send Email</a>
        </div>

        <div class="p-6 shadow rounded text-center">
            <h3 class="font-bold text-xl mb-2">WhatsApp</h3>
            <p>+92 336 53085030</p>
            <a href="https://wa.me/009233653085030" target="_blank"
               class="text-green-700 font-semibold">Message</a>
        </div>

        <div class="p-6 shadow rounded text-center">
            <h3 class="font-bold text-xl mb-2">Hours</h3>
            <p>Mon - Sun: 9 AM - 10 PM</p>
            <small class="text-gray-500">GMT +5</small>
        </div>

    </div>
</section>

<!-- FORM -->
<section class="container mx-auto px-4 max-w-7xl py-16 bg-gray-50 rounded-2xl">

    <div class="grid lg:grid-cols-2 gap-8">

        <div class="bg-white p-6 shadow rounded">
            <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>

            <form onsubmit="sendToWhatsApp(event)">

                <input id="name" type="text" placeholder="Your Name"
                       class="w-full mb-3 p-3 border rounded">

                <input id="email" type="email" placeholder="Your Email"
                       class="w-full mb-3 p-3 border rounded">

                <select id="course" class="w-full mb-3 p-3 border rounded">
                    <option value="">Select Course</option>
                    <option value="Quran Reading">Quran Reading</option>
                    <option value="Tajweed">Tajweed</option>
                    <option value="Noorani Qaida">Noorani Qaida</option>
                </select>

                <textarea id="message" placeholder="Message"
                          class="w-full mb-3 p-3 border rounded h-32"></textarea>

                <button type="submit"
                        class="bg-green-700 text-white px-6 py-3 rounded w-full">
                    Send Message on WhatsApp
                </button>

            </form>
        </div>

        <div class="space-y-6">

            <div class="p-6 bg-white shadow rounded">
                <h3 class="font-bold text-xl mb-2">Quick Support</h3>
                <p>We reply within 24 hours.</p>
            </div>

            <div class="p-6 bg-white shadow rounded">
                <h3 class="font-bold text-xl mb-2">Location</h3>
                <p>Online Worldwide Academy</p>
            </div>

        </div>

    </div>
</section>

<!-- FAQ -->
<section class="container mx-auto px-4 max-w-4xl py-16">

    <h2 class="text-3xl font-bold text-center mb-10 text-green-800">
        Frequently Asked Questions
    </h2>

    <div class="space-y-4">

        @foreach($faqs as $index => $faq)
            <div class="p-4 shadow rounded cursor-pointer" onclick="toggleFaq({{ $index }})">

                <div class="flex justify-between items-center">
                    <h3 class="font-bold text-green-900">
                        {{ $faq['question'] }}
                    </h3>

                    <span id="faq-icon-{{ $index }}">▼</span>
                </div>

                <p id="faq-answer-{{ $index }}" class="hidden mt-2 text-gray-600">
                    {{ $faq['answer'] }}
                </p>

            </div>
        @endforeach

    </div>
</section>

<!-- CTA -->
<section class="container mx-auto px-4 max-w-5xl py-16">

    <div class="bg-linear-to-r from-[#0a5c36] to-[#0a7c46] text-white rounded-2xl py-12 px-6 text-center">

        <h2 class="text-3xl font-bold mb-4">
            Start Your Learning Journey Today
        </h2>

        <p class="mb-6">
            Join thousands of students worldwide.
        </p>

    </div>

</section>

<!-- SCRIPT -->
<script>
function sendToWhatsApp(event) {
    event.preventDefault();

    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let course = document.getElementById("course");
    let message = document.getElementById("message");

    let phone = "923365385030";

    let text =
        "New Admission Inquiry:\n\n" +
        "Name: " + name.value + "\n" +
        "Email: " + email.value + "\n" +
        "Course: " + course.value + "\n" +
        "Message: " + message.value;

    let url = "https://wa.me/" + phone + "?text=" + encodeURIComponent(text);

    // Open WhatsApp
    window.open(url, "_blank");

    // ✅ Clean form after sending
    name.value = "";
    email.value = "";
    course.value = "";
    message.value = "";

    // Optional: redirect back or show message
    setTimeout(() => {
        alert("Redirecting back to page...");
        window.location.href = window.location.href; // refresh page
    }, 1000);
}

function toggleFaq(index) {
    let answer = document.getElementById("faq-answer-" + index);
    let icon = document.getElementById("faq-icon-" + index);

    answer.classList.toggle("hidden");

    icon.innerHTML = answer.classList.contains("hidden") ? "▼" : "▲";
}
</script>

@endsection