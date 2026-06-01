@extends('layouts.app')

@php
    use Illuminate\Support\Str;

    $courseUrl = url()->current();
@endphp

@section('title', $course->title . ' | Online Quran Course - Ilm e Quran Quran Academy')

@section('meta_description', Str::limit(strip_tags($course->short_description), 160))

@section('meta_keywords', 'online Quran course, Quran learning, ' . $course->title . ', Tajweed, Hifz, Quran academy')

@section('content')

    <!-- OPEN GRAPH -->
    @section('head')
        <meta property="og:title" content="{{ $course->title }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($course->short_description), 160) }}">
        <meta property="og:image" content="{{ $course->image_url }}">
        <meta property="og:url" content="{{ $courseUrl }}">
        <meta property="og:type" content="website">
    @endsection

    <!-- HERO -->
    <section class="relative text-white py-20 bg-cover bg-center"
        style="background-image: linear-gradient(rgba(10,92,54,0.9), rgba(10,124,70,0.9)), url('{{ $course->image_url }}');">

        <div class="max-w-6xl mx-auto px-4">

            <span class="inline-block bg-yellow-400 text-green-900 px-3 py-1 rounded-full text-sm font-semibold mb-3">
                {{ ucfirst($course->level) }}
            </span>

            <h1 class="text-3xl md:text-5xl font-bold mb-3">
                {{ $course->title }}
            </h1>

            <p class="text-lg md:text-xl opacity-90 mb-6">
                {{ $course->short_description }}
            </p>

            <div class="flex flex-wrap gap-6 text-sm md:text-base">
                <div class="flex items-center gap-2">
                    <i class="fas fa-clock text-yellow-400"></i>
                    <span>{{ $course->duration }}</span>
                </div>

                <div class="flex items-center gap-2">
                    <i class="fas fa-user-graduate text-yellow-400"></i>
                    <span>1-on-1 Expert Teaching</span>
                </div>
            </div>

        </div>
    </section>

    <!-- MAIN -->
    <section class="max-w-6xl mx-auto px-4 py-16">

        <div class="grid md:grid-cols-3 gap-10">

            <!-- LEFT CONTENT -->
            <div class="md:col-span-2 space-y-10">

                <!-- DESCRIPTION -->
                <div class="text-gray-700 leading-8 space-y-6

                    [&_h1]:text-3xl [&_h1]:font-extrabold [&_h1]:text-green-900 [&_h1]:mb-4 [&_h1]:mt-8
                    [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-green-800 [&_h2]:mt-8 [&_h2]:mb-3
                    [&_h3]:text-xl [&_h3]:font-semibold [&_h3]:text-green-700 [&_h3]:mt-6 [&_h3]:mb-2

                    [&_p]:mb-4 [&_p]:leading-8 [&_p]:text-gray-700
                    [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:space-y-2
                    [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:space-y-2

                    [&_strong]:text-green-900 [&_strong]:font-semibold
                    [&_a]:text-green-700 [&_a]:font-medium [&_a:hover]:underline

                    [&_blockquote]:border-l-4 [&_blockquote]:border-green-500 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-600

                    [&_code]:bg-gray-100 [&_code]:px-2 [&_code]:py-1 [&_code]:rounded [&_code]:text-sm
                ">

                    {!! Str::markdown($course->description) !!}

                </div>

                <!-- BONUS BOX -->
                <div
                    class="bg-gradient-to-br from-green-50 via-white to-green-50 border border-green-200 rounded-2xl p-6 shadow-sm">

                    <!-- HEADER -->
                    <div class="flex items-start gap-3 mb-5">

                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-700 shadow-sm">
                            ✦
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-green-900">
                                Bonus Islamic Learning (Optional Add-on)
                            </h3>
                            <p class="text-sm text-green-700/80">
                                Included at the end of selected sessions
                            </p>
                        </div>

                    </div>

                    <!-- DESCRIPTION -->
                    <p class="text-gray-700 leading-7 mb-5">
                        Alongside structured Quran learning, students may receive short optional Islamic guidance sessions
                        designed to strengthen faith, daily practice, and moral character in a practical and balanced way.
                    </p>

                    <!-- FEATURES -->
                    <div class="grid sm:grid-cols-2 gap-3 text-gray-700">

                        <div class="flex items-start gap-2">
                            <span class="text-green-700 font-bold">✔</span>
                            <span>Kalimas & Aqeedah fundamentals</span>
                        </div>

                        <div class="flex items-start gap-2">
                            <span class="text-green-700 font-bold">✔</span>
                            <span>Daily Duas & Salah guidance</span>
                        </div>

                        <div class="flex items-start gap-2">
                            <span class="text-green-700 font-bold">✔</span>
                            <span>Islamic manners & daily etiquette</span>
                        </div>

                        <div class="flex items-start gap-2">
                            <span class="text-green-700 font-bold">✔</span>
                            <span>Prophetic teachings for all ages</span>
                        </div>

                    </div>

                    <!-- FOOT NOTE -->
                    <div class="mt-5 text-sm text-green-700 border-t border-green-100 pt-3">
                        This feature is optional and can be enabled based on student preference.
                    </div>

                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="space-y-6">

                <div class="bg-white shadow-lg rounded-2xl p-6 text-center sticky top-24">

                    <h3 class="text-lg font-bold text-green-800 mb-3">
                        Ready to Start Learning?
                    </h3>

                    <p class="text-gray-600 text-sm mb-6">
                        Book your free trial class today.
                    </p>

                    <a href="{{ route('free-trial.index') }}"
                        class="block bg-green-700 text-white py-3 rounded-lg hover:bg-green-800 transition">
                        Book Free Trial
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection