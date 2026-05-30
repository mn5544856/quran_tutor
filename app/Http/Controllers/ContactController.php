<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $faqs = [
            [
                'question' => 'How can I contact you?',
                'answer' => 'You can contact us via WhatsApp, email, or by filling the contact form on this page.'
            ],
            [
                'question' => 'What are your response times?',
                'answer' => 'We usually respond within 24 hours for email and within minutes on WhatsApp.'
            ],
            [
                'question' => 'Do you offer a free trial class?',
                'answer' => 'Yes, we offer a free trial class so you can understand our teaching style before enrolling.'
            ],
            [
                'question' => 'Can I choose class timings?',
                'answer' => 'Yes, we offer flexible timings based on your availability and timezone.'
            ],
            [
                'question' => 'Is online learning available worldwide?',
                'answer' => 'Yes, our classes are available globally through Zoom or WhatsApp.'
            ]
        ];

        return view("contact.index", compact('faqs'));
    }
}