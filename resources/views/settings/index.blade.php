@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    @include('components.spinners.page-loader')
    @include('components.nav.navbar')
    @include('components.nav.sidebar')

    <section class="content">
        <div class="content__inner content__inner--sm">
            <header class="content__title">
                <h1>Settings</h1>
                <small>Last edited on {{ auth()->user()->updated_at->format('F d, Y') }}</small>

                <div class="actions">
                    <a href="" class="actions__item fas fa-chart-line"></a>
                    <a href="" class="actions__item fas fa-check-double"></a>

                    <div class="dropdown actions__item">
                        <i data-toggle="dropdown" class="fas fa-ellipsis-v"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="" class="dropdown-item">Refresh</a>
                            <a href="" class="dropdown-item">Manage Widgets</a>
                            <a href="" class="dropdown-item">Settings</a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="card new-contact">
                <div class="new-contact__header">
                    <a href="#" class="fas fa-camera new-contact__upload" data-target="#avatar" data-toggle="modal"></a>
                    <img
                        @isset(auth()->user()->profile_image)
                            src="{{ auth()->user()->profile_image }}"
                        @else
                            src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}"
                        @endisset
                         class="new-contact__img"
                         alt="{{ auth()->user()->name }}">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf

                        @include('components.modals.profile-image')

                        <div class="tab-container">
                            <ul class="nav nav-tabs nav-fill mb-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#social" role="tab">Social Links</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active fade show" id="general" role="tabpanel">
                                    <div class="row">
                                        {{--First name--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name"
                                                       class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                       placeholder="eg: Samuel" value="{{ auth()->user()->first_name }}"
                                                       required>
                                                @if ($errors->has('first_name'))
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </div>
                                                @endif
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Last name--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name"
                                                       class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                       placeholder="eg: Nicholas" value="{{ auth()->user()->last_name }}"
                                                       required>
                                                @if ($errors->has('last_name'))
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </div>
                                                @endif
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Email--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" name="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       placeholder="eg: name@example.com"
                                                       value="{{ auth()->user()->email }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Phone number--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone_number" class="form-control input-mask"
                                                       data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000"
                                                       value="{{ auth()->user()->phoneNumber->phone_number }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Address--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control"
                                                       placeholder="eg: 1502 5th St"
                                                       value="{{ auth()->user()->address->address }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--City--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control"
                                                       placeholder="eg: Twentynine Palms"
                                                       value="{{ auth()->user()->address->city }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--State--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select class="select2" name="state">
                                                    @foreach(\App\Helpers\Data\States::US_STATES_LIST as $abbrev => $state)
                                                        <option value="{{ $abbrev }}"
                                                                @if(auth()->user()->address->state == $abbrev) selected @endif>{{ $state }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{--Zip--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" name="zip" class="form-control input-mask"
                                                       data-mask="00000" placeholder="eg: 92278"
                                                       value="{{ auth()->user()->address->zip }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Dob--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth (m/d/y)</label>
                                                <input type="text" name="dob" id="dob" class="form-control input-mask"
                                                       data-mask="00/00/0000" placeholder="eg: 10/11/1775"
                                                       value="{{ \Carbon\Carbon::parse(auth()->user()->dob)->format('m/d/Y') }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Gender--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="select2" name="gender">
                                                    @foreach(\App\Helpers\User\Gender::GENDER_LIST as $gender)
                                                        <option value="{{ $gender }}"
                                                            @if(auth()->user()->gender == $gender) selected @endif>
                                                            {{ ucfirst($gender) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{--Bio--}}
                                    <div class="form-group">
                                        <label>Bio</label>
                                        <textarea name="bio"
                                                  class="form-control textarea-autosize">{{ auth()->user()->bio }}</textarea>
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                {{--Social links--}}
                                <div class="tab-pane fade" id="social" role="tabpanel">
                                    <div class="row">
                                        {{--Facebook--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="social[facebook]"
                                                       class="form-control"
                                                       placeholder="eg: samuelnicholas" value="{{ auth()->user()->social['facebook'] ?? '' }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Twitter--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="social[twitter]"
                                                       class="form-control"
                                                       placeholder="eg: samuelnicholas" value="{{ auth()->user()->social['twitter'] ?? '' }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--YouTube--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>YouTube</label>
                                                <input type="text" name="social[youtube]"
                                                       class="form-control"
                                                       placeholder="eg: samuelnicholas" value="{{ auth()->user()->social['youtube'] ?? '' }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        {{--Instagram--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="social[instagram]"
                                                       class="form-control"
                                                       placeholder="eg: samuelnicholas" value="{{ auth()->user()->social['instagram'] ?? '' }}">
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="mt-5 text-center">
                            <a href="{{ route('feed') }}" class="btn btn-link text-muted">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('components.nav.footer')
    </section>
@endsection