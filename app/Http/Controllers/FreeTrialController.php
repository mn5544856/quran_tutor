<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\FreeTrialBooked;
use App\Mail\FreeTrialAdminNotification;
use Illuminate\Validation\Rule;

class FreeTrialController extends Controller
{
    public function index()
    {
        $features = [
            [
                'icon' => 'fas fa-user-graduate',
                'title' => 'Meet Your Teacher',
                'description' => 'Join a live session and understand the teacher’s teaching style.'
            ],
            [
                'icon' => 'fas fa-video',
                'title' => 'Live Class Experience',
                'description' => 'Attend a real online class via Zoom or WhatsApp call.'
            ],
            [
                'icon' => 'fas fa-search',
                'title' => 'Basic Level Check',
                'description' => 'Teacher will check your reading or learning level.'
            ],
            [
                'icon' => 'fas fa-road',
                'title' => 'Learning Guidance',
                'description' => 'Get a simple plan based on your goals and current level.'
            ]
        ];

        $faqs = [
            [
                'question' => 'Is the trial class really free?',
                'answer' => 'Yes, absolutely! The 30-minute trial class is completely free with no hidden charges or obligations.'
            ],
            [
                'question' => 'What happens during the trial class?',
                'answer' => 'You will meet your teacher, experience our teaching methodology, have your current level assessed, and receive a personalized learning plan.'
            ],
            [
                'question' => 'Do I need any special equipment?',
                'answer' => 'You only need a device (computer, tablet, or smartphone) with internet connection. No special software required.'
            ],
            [
                'question' => 'Can I choose the teacher?',
                'answer' => 'Yes, based on your requirements (gender, specialization, teaching style), we match you with the most suitable teacher.'
            ],
            [
                'question' => 'What if I miss my trial class?',
                'answer' => 'You can reschedule up to 24 hours before your scheduled time. We\'ll help you book another slot.'
            ],
            [
                'question' => 'Is there any commitment after trial?',
                'answer' => 'No, there is absolutely no obligation to continue. The decision to enroll is completely yours.'
            ]
        ];

        $availability = [
            '24/7' => 'Round the clock scheduling',
            'All Time Zones' => 'We accommodate students worldwide',
            'Weekends Included' => 'Saturday & Sunday slots available',
            'Flexible Rescheduling' => 'Change timing if plans change'
        ];

        $popularTimes = [
            ['time' => 'Morning (6 AM - 12 PM)', 'popularity' => 'High'],
            ['time' => 'Afternoon (12 PM - 5 PM)', 'popularity' => 'Medium'],
            ['time' => 'Evening (5 PM - 10 PM)', 'popularity' => 'Very High'],
            ['time' => 'Night (10 PM - 6 AM)', 'popularity' => 'Low']
        ];

        return view('free-trial.index', compact('features', 'faqs', 'availability', 'popularTimes'));
    }

    public function book(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[\p{L}\s]+$/u'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'country_code' => [
                'required',
                'string',
                'max:6',
                'regex:/^\+[0-9]{1,5}$/'
            ],
            'phone' => [
                'required',
                'string',
                'min:7',
                'max:20',
                'regex:/^[0-9\s\-\(\)]+$/'
            ],
            'country' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[\p{L}\s\-\(\)]+$/u'
            ],
            'current_level' => [
                'required',
                Rule::in(['beginner', 'intermediate', 'advanced'])
            ],
            'delivery_method' => [
                'required',
                Rule::in(['whatsapp', 'email'])
            ],
            'course' => [
                'required',
                Rule::in(['hifz', 'tajweed', 'noorani_qaida', 'basic_quran'])
            ],
        ], [
            'name.required' => 'Please enter your name.',
            'name.min' => 'Name must be at least 2 characters.',
            'name.regex' => 'Name should contain only letters and spaces.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'country_code.required' => 'Please select your country code.',
            'country_code.regex' => 'Country code must start with + (e.g. +92, +1).',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
            'country.required' => 'Please enter your country.',
            'country.regex' => 'Country name should contain only letters, spaces, hyphens, or parentheses.',
            'current_level.required' => 'Please select your current level.',
            'delivery_method.required' => 'Please select a contact method.',
            'course.required' => 'Please select a course.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Sanitized data - only full_phone (combined country_code + phone)
        $data = [
            'name' => strip_tags(trim($request->name)),
            'email' => strtolower(strip_tags(trim($request->email))),
            'full_phone' => strip_tags(trim($request->country_code)) . ' ' . strip_tags(trim($request->phone)),
            'country' => strip_tags(trim($request->country)),
            'level' => $request->current_level,
            'course' => strip_tags(trim($request->course)),
        ];

        // WhatsApp Delivery
        if ($request->delivery_method === 'whatsapp') {
            $message = "📚 *New Free Trial Booking*%0A";
            $message .= "👤 Name: " . rawurlencode($data['name']) . "%0A";
            $message .= "📧 Email: " . rawurlencode($data['email']) . "%0A";
            $message .= "📞 Phone: " . rawurlencode($data['full_phone']) . "%0A";
            $message .= "🌍 Country: " . rawurlencode($data['country']) . "%0A";
            $message .= "📊 Level: " . rawurlencode($data['level']) . "%0A";
            $message .= "📖 Course: " . rawurlencode($data['course']) . "%0A";
            $message .= "%0A✅ Please confirm this trial booking.";

            $whatsappNumber = "923365385030";
            $url = "https://wa.me/{$whatsappNumber}?text={$message}";

            return redirect()->away($url);
        }

        // Email Delivery
        try {
            // Send confirmation to user
            // Mail::to($data['email'])->send(new FreeTrialBooked($data));

            // Send notification to admin
            // Mail::to('info@ilmequran.com')->send(new FreeTrialAdminNotification($data));
            Mail::to('info@ilmequran.com')->send(new FreeTrialBooked($data));

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unable to send email right now. Please try again later.');
        }

        return redirect()
            ->route('free-trial.index')
            ->with('success', 'Your booking has been sent successfully! We will contact you soon.');
    }
}