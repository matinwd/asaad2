<a href="javascript:;" style="padding-bottom: 1.5rem;" class="contact-btn" data-toggle="modal" data-target="#myModal">
    <div class="contact-bg">{{ trans('actions.contact_btn') }}</div>
</a>
<div style="padding-top: .25rem;border-radius: .25rem;padding-bottom: .25rem;" class="contact-form text-black">
    <a href="javascript:;" class="close-btn text-capitalize text-{{ $cRight }}"><i class="flaticon-cancel"></i></a>
    <h2 class="title mb-5 d-inline-block">{{ trans('contact_modal.title') }}</h2>
    <form id="queto-form" method="post" action="{{ route('contact_us') }}">
        @csrf
        {!! RecaptchaV3::field('contact_us') !!}
        @error('g-recaptcha-response')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="messages"></div>
        <div class="form-group">
            <input id="form_name1" type="text" name="name" class="form-control" placeholder="{{ trans('contact_modal.field_label_name') }}"
                   required="required" data-error="{{ trans('contact_modal.field_validate_name') }}">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <input id="form_email1" type="email" name="email" class="form-control" placeholder="{{ trans('contact_modal.field_label_email') }}"
                   required="required" data-error="{{ trans('contact_modal.field_validate_email') }}">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <input id="form_subject" type="text" name="subject" class="form-control" placeholder="{{ trans('contact_modal.field_label_subject') }}" required="required" data-error="{{ trans('contact_modal.field_validate_subject') }}">
        </div>
        <div class="form-group">
            <textarea id="form_message1" name="message" class="form-control" placeholder="{{ trans('contact_modal.field_label_message') }}" rows="4"
                      required="required" data-error="{{ trans('contact_modal.field_validate_message') }}"></textarea>
            <div class="help-block with-errors"></div>
        </div>
        <button class="btn btn-border btn-radius"><span>{{ trans('contact_modal.btn_send') }}</span>
        </button>
    </form>
</div>
