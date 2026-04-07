<div class="contact-form-wrap">
    <form action="{{ route('contact.store') }}" method="post" class="contact-form-php">
        @csrf
        @if (session('contact_success'))
            <div class="alert alert-success mb-3" role="alert">{{ session('contact_success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mb-3" role="alert">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row gy-4">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="{{ __('Your Name') }}" required autocomplete="name" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="{{ __('Your Email') }}" required autocomplete="email" value="{{ old('email') }}">
            </div>
            <div class="col-md-6">
                <input type="tel" name="phone" class="form-control" placeholder="{{ __('Phone Number') }}" autocomplete="tel" value="{{ old('phone') }}">
            </div>
            <div class="col-md-6">
                <select name="service" class="form-control" required>
                    <option value="" disabled @selected(! old('service'))>{{ __('What do you need?') }}</option>
                    <option value="hardware" @selected(old('service') === 'hardware')>{{ __('Hardware & tools') }}</option>
                    <option value="building" @selected(old('service') === 'building')>{{ __('Building materials') }}</option>
                    <option value="bulk" @selected(old('service') === 'bulk')>{{ __('Bulk / delivery enquiry') }}</option>
                    <option value="quote" @selected(old('service') === 'quote')>{{ __('Price quote') }}</option>
                    <option value="other" @selected(old('service') === 'other')>{{ __('Other') }}</option>
                </select>
            </div>
            <div class="col-12">
                <input type="text" name="subject" class="form-control" placeholder="{{ __('Subject') }}" required value="{{ old('subject') }}">
            </div>
            <div class="col-12">
                <textarea name="message" class="form-control" rows="5" placeholder="{{ __('Describe what you need (items, quantities, delivery, etc.)…') }}" required>{{ old('message') }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn-submit">{{ __('Send Message') }}</button>
            </div>
        </div>
    </form>
</div>
