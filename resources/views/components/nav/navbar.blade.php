<header class="header">
    <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
        <div class="navigation-trigger__inner">
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
        </div>
    </div>

    <div class="header__logo hidden-sm-down">
        <h1><a href="{{ route('dashboard') }}">{{ config('app.name') }}</a></h1>
    </div>

    <form class="search" method="POST" action="">
        @csrf
        <div class="search__inner">
            <input type="text" name="search" class="search__text" placeholder="Search for people, files, documents...">
            <i class="fas fa-search search__helper" data-ma-action="search-close"></i>
        </div>
    </form>

    <ul class="top-nav">
        <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="fas fa-search"></i></a></li>

        <li class="dropdown">
            <a href="" data-toggle="dropdown"><i class="fas fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                <div class="listview listview--hover">
                    <div class="listview__header">
                        Messages

                        <div class="actions">
                            <a href="messages.html" class="actions__item fas fa-plus"></a>
                        </div>
                    </div>

                    <a href="" class="listview__item">
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                David Belle <small>12:01 PM</small>
                            </div>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Jonathan Morris
                                <small>02:45 PM</small>
                            </div>
                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Fredric Mitchell Jr.
                                <small>08:21 PM</small>
                            </div>
                            <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Glenn Jecobs
                                <small>08:43 PM</small>
                            </div>
                            <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Bill Phillips
                                <small>11:32 PM</small>
                            </div>
                            <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                        </div>
                    </a>

                    <a href="" class="view-more">View all messages</a>
                </div>
            </div>
        </li>

        <li class="dropdown top-nav__notifications">
            <a href="" data-toggle="dropdown" class="top-nav__notify">
                <i class="fas fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                <div class="listview listview--hover">
                    <div class="listview__header">
                        Notifications

                        <div class="actions">
                            <a href="" class="actions__item fas fa-check-double" data-ma-action="notifications-clear"></a>
                        </div>
                    </div>

                    <div class="listview__scroll scrollbar-inner">
                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">David Belle</div>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Jonathan Morris</div>
                                <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Fredric Mitchell Jr.</div>
                                <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Glenn Jecobs</div>
                                <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Bill Phillips</div>
                                <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">David Belle</div>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Jonathan Morris</div>
                                <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                            </div>
                        </a>

                        <a href="" class="listview__item">
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=500') }}" class="listview__img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">Fredric Mitchell Jr.</div>
                                <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                            </div>
                        </a>
                    </div>

                    <div class="p-1"></div>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="" data-toggle="dropdown"><i class="fas fa-check-circle"></i></a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                <div class="listview listview--hover">
                    <div class="listview__header">Tasks</div>

                    <a href="" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading mb-2">HTML5 Validation Report</div>

                            <div class="progress">
                                <div class="progress-bar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading mb-2">Google Chrome Extension</div>

                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading mb-2">Social Intranet Projects</div>

                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading mb-2">Bootstrap Admin Template</div>

                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading mb-2">Youtube Client App</div>

                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="view-more">View all tasks</a>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="" data-toggle="dropdown"><i class="fas fa-th"></i></a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                <div class="row app-shortcuts">
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="fas fa-calendar-alt"></i>
                        <small class="">Calendar</small>
                        <span class="app-shortcuts__helper bg-red"></span>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="fas fa-file"></i>
                        <small class="">Files</small>
                        <span class="app-shortcuts__helper bg-blue"></span>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="fas fa-envelope"></i>
                        <small class="">Email</small>
                        <span class="app-shortcuts__helper bg-teal"></span>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="fas fa-chart-line"></i>
                        <small class="">Reports</small>
                        <span class="app-shortcuts__helper bg-blue-grey"></span>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="fas fa-newspaper"></i>
                        <small class="">News</small>
                        <span class="app-shortcuts__helper bg-orange"></span>
                    </a>
                    <a class="col-4 app-shortcuts__item" href="">
                        <i class="fas fa-images"></i>
                        <small class="">Gallery</small>
                        <span class="app-shortcuts__helper bg-light-green"></span>
                    </a>
                </div>
            </div>
        </li>

        <li class="dropdown hidden-xs-down">
            <a href="" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-item theme-switch">
                    Theme Switch

                    <div class="btn-group btn-group-toggle btn-group--colors" data-toggle="buttons">
                        <label class="btn bg-green active"><input type="radio" value="green" autocomplete="off" checked></label>
                        <label class="btn bg-blue"><input type="radio" value="blue" autocomplete="off"></label>
                        <label class="btn bg-red"><input type="radio" value="red" autocomplete="off"></label>
                        <label class="btn bg-orange"><input type="radio" value="orange" autocomplete="off"></label>
                        <label class="btn bg-teal"><input type="radio" value="teal" autocomplete="off"></label>

                        <div class="clearfix mt-2"></div>

                        <label class="btn bg-cyan"><input type="radio" value="cyan" autocomplete="off"></label>
                        <label class="btn bg-blue-grey"><input type="radio" value="blue-grey" autocomplete="off"></label>
                        <label class="btn bg-purple"><input type="radio" value="purple" autocomplete="off"></label>
                        <label class="btn bg-indigo"><input type="radio" value="indigo" autocomplete="off"></label>
                        <label class="btn bg-brown"><input type="radio" value="brown" autocomplete="off"></label>
                    </div>
                </div>
                <a href="" class="dropdown-item">Fullscreen</a>
                <a href="" class="dropdown-item">Clear Local Storage</a>
            </div>
        </li>
    </ul>
</header>
