@extends('layouts.app')

@section('title', __('Contact'))
@section('content')
    <!--Main Content Start-->
    <div class="main-content p80 innerpagebg wf100">
        <!--Contact Page Start-->
        <div class="contact-two">
            <div class="container">
                <div class="row mb-80">
                    <!--Start-->
                    <div class="col-md-4">
                        <div class="contact-box">
                            <img src="{{ asset('public/front/images/loc-icon.png') }}" alt="">
                            <h5>{{ __('Address') }}:</h5>
                            <p> {{ $contact->address }}
                            </p>
                        </div>
                    </div>
                    <!--End-->
                    <!--Start-->
                    <div class="col-md-4">
                        <div class="contact-box">
                            <img src="{{ asset('public/front/images/phone-icon.png') }}" alt="">
                            <h5>{{ __('Contact') }}:</h5>
                            <p><strong>{{ __('Phone') }}:</strong> {{ $contact->phone }}</p>
                        </div>
                    </div>
                    <!--End-->
                    <!--Start-->
                    <div class="col-md-4">
                        <div class="contact-box">
                            <img src="{{ asset('public/front/images/mail-icon.png') }}" alt="">
                            <h5>{{ __('For More Information') }}:</h5>
                            <p> <strong>{{ __('Email') }}:</strong> {{ $contact->email }}</p>
                        </div>
                    </div>
                    <!--End-->
                </div>
            </div>
        </div>
        <!--Contact Page End-->
        <div class="google-map">
            <div class="google-map">
                <iframe src="<?= $contact->google_map ?>"></iframe>
            </div>
        </div>
        <div class="contact-two wf100 p80-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <!--Form Start-->
                    <div class="col-lg-10">
                        <span id="form_output"></span>
                        <form id="contact-form" method="post">
                            @csrf
                            <div class="contact-form">
                                <h2>{{ __('Feel Free to Contact us') }}</h2>
                                <ul class="form-row">
                                    <li class="half-col">
                                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                                    </li>
                                    <li class="half-col">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                    </li>
                                    <li class="half-col">
                                        <input type="text" class="form-control" placeholder="Contact" name="phone">
                                    </li>
                                    <li class="half-col">
                                        <input type="text" class="form-control" placeholder="Subject" name="subject">
                                    </li>
                                    <li class="full-col">
                                        <textarea class="form-control" placeholder="Write Your Message" name="message"></textarea>
                                    </li>
                                    <li class="full-col">
                                        <button type="submit">{{ __('Contact us Now') }}</button>
                                    </li>
                                </ul>
                            </div>
                        </form>

                    </div>
                    <!--Form End-->
                </div>
            </div>
        </div>
    </div>
    <!--Main Content End-->
@endsection

@section('js')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            });
            $('#contact-form').submit(function(event) {
                event.preventDefault();
                var formData = $('#contact-form').serialize();
                $.ajax({
                    url: '{{ route("query") }}',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[
                                    count] + '</div>';
                            }
                            $('#form_output').html(error_html);
                        } else {
                            $('#form_output').html(data.success);
                            $('#contact-form')[0].reset();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
