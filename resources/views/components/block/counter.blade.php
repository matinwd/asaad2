<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
        <div class="about-us-counter g-4 d-flex justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <div class="counter-icon"> {!! $item['icon'] !!} </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer odometer-auto-theme" data-odometer-final="5400">
                            <div class="odometer-inside">
                                <span class="odometer-digit">
                                    <span class="odometer-digit-spacer">8</span>
                                    <span class="odometer-digit-inner">
                                        <span class="odometer-ribbon">
                                            <span class="odometer-ribbon-inner">
                                                <span class="odometer-value">5</span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <span class="odometer-formatting-mark">,</span>
                                <span class="odometer-digit">
                                    <span class="odometer-digit-spacer">8</span>
                                    <span class="odometer-digit-inner">
                                        <span class="odometer-ribbon">
                                            <span class="odometer-ribbon-inner">
                                                <span class="odometer-value">4</span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <span class="odometer-digit">
                                    <span class="odometer-digit-spacer">8</span>
                                    <span class="odometer-digit-inner">
                                        <span class="odometer-ribbon">
                                            <span class="odometer-ribbon-inner">
                                                <span class="odometer-value">0</span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                                <span class="odometer-digit">
                                    <span class="odometer-digit-spacer">8</span>
                                    <span class="odometer-digit-inner">
                                        <span class="odometer-ribbon">
                                            <span class="odometer-ribbon-inner">
                                                <span class="odometer-value">0</span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </h3>
                        <p>{{ $item['title'] }}</p>
                    </div>
                </div>
            </div>
        </div>
