<footer class="footer footer-2 pos-r">
    <div class="primary-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <h5>{{ trans('footer.about_company') }}</h5>
                    <p class="mb-0">
                        <img id="footer-logo-img" class="img-center d-block"
                             src="{{ \App\Helpers\Helper::Setting('logo_dark')->val }}" alt="" height="70px">
                        <br>
                        {{ \App\Helpers\Helper::Setting('footer_about_compacy')->val }}
                    </p>
                    <a class="btn-simple" href="{{ \App\Helpers\Helper::Setting('footer_about_compacy_url')->val }}">
                        <span>
                         {{ trans('actions.more_details') }}
                            <i class="mx-2 fas fa-long-arrow-alt-{{ $cLeft }}"></i>
                        </span>
                    </a>
                    @php($socialSetting = \App\Helpers\Helper::Setting('social_enable'))
                    @if($socialSetting->val == 1)
                        <div class="social-icons social-colored mt-3">
                            <ul class="list-inline mb-0">
                                @php($facebook = \App\Helpers\Helper::Setting('social_facebook'))
                                @if(strlen(trim($facebook->val)) > 0)
                                    <li class="social-facebook">
                                        <a href="{{ $facebook->val }}">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif
                                @php($twitter = \App\Helpers\Helper::Setting('social_twitter'))
                                @if(strlen(trim($twitter->val)) > 0)
                                    <li class="social-twitter">
                                        <a href="{{ $twitter->val }}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                                @php($instagram = \App\Helpers\Helper::Setting('social_insta'))
                                @if(strlen(trim($instagram->val)) > 0)
                                    <li class="social-instagram">
                                        <a href="{{ $instagram->val }}">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif
                                @php($linkedin = \App\Helpers\Helper::Setting('social_linkdin'))
                                @if(strlen(trim($linkedin->val)) > 0)
                                    <li class="social-instagram">
                                        <a href="{{ $linkedin->val }}">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="col-lg-2 col-md-6 sm-mt-5 footer-list">
                    <h5>{{ trans('footer.links') }}</h5>
                    <ul class="list-unstyled">
                        @foreach ($menu->items as $item)
                            <li>
                                <a href="{{ $item['url'] ?? '#' }}">
                                    <i class="fas fa-angle-{{ $cLeft }}"></i>
                                    {{ $item['name'] ?? 'Item' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-5 col-md-12 md-mt-5 widget">
                    <h5>{{ trans('footer.contact_info') }}</h5>
                    <ul class="contact-info list-unstyled mt-4" dir="ltr">
                        <li class="mb-4">
                            <i class="flaticon-paper-plane"></i>
                            <span>{{ trans('footer.office_label') }}</span>
                            <p>{{ \App\Helpers\Helper::Setting('footer_office_address')->val }}</p>
                        </li>
                        @php($tel = \App\Helpers\Helper::Setting('footer_phone')->val)
                        <li class="mb-4"><i
                                    class="flaticon-phone-call"></i><span>{{ trans('footer.tell_label') }}</span><a
                                    href="tel:{{ ($tel[0] ?? 'z') == "0" ? substr_replace(str_replace('-',null,$tel),'+98',0,1) : $tel }}">{{ $tel }}</a>
                        </li>
                        <li><i class="flaticon-message"></i><span>{{ trans('footer.email_label') }}</span><a
                                    href="mailto:{{ \App\Helpers\Helper::Setting('footer_email')->val }}">{{ \App\Helpers\Helper::Setting('footer_email')->val }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="secondary-footer">
        <div class="container">
            <div class="copyright">
                <div class="row text-center">
                    <div class="col-md-12">
                        <span>{{ \App\Helpers\Helper::Setting('footer_copyright')->val }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
