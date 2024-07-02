@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">اعضای هیئت مدیره</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a>
                    </li>
                    <li class="breadcrumb-item active">اعضای هیئت مدیره</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="team-member text-center">
                            <div class="team-images">
                                <img class="img-fluid" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                <div class="team-social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-description">
                                <h5><a href="javascript:;">محمود عليمحمدي</a></h5>
                                <span>رئیس هیئت مدیره</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 md-mt-5">
                        <div class="team-member text-center">
                            <div class="team-images">
                                <img class="img-fluid" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                <div class="team-social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-description">
                                <h5><a href="javascript:;">مهدی محمد خانی</a></h5>
                                <span>نائب رئیس هیئت مدیره</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 md-mt-5">
                        <div class="team-member text-center">
                            <div class="team-images">
                                <img class="img-fluid" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                <div class="team-social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-description">
                                <h5><a href="javascript:;">اسمعیل صالحی</a></h5>
                                <span>عضو هیئت مدیره</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 col-md-12">
                        <div class="team-member text-center">
                            <div class="team-images">
                                <img class="img-fluid" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                <div class="team-social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-description">
                                <h5><a href="javascript:;">حسين ميرکمال اردستاني</a></h5>
                                <span>عضو هیئت مدیره</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 md-mt-5">
                        <div class="team-member text-center">
                            <div class="team-images">
                                <img class="img-fluid" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                <div class="team-social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-description">
                                <h5><a href="javascript:;">فرشاد صبری</a></h5>
                                <span>عضو هیئت مدیره</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 md-mt-5">
                        <div class="team-member text-center">
                            <div class="team-images">
                                <img class="img-fluid" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                <div class="team-social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-description">
                                <h5><a href="javascript:;">محمود علی پور جدی</a></h5>
                                <span>مدیر عامل</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
