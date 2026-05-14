@extends('layouts.site')

@section('title', 'Admissions | Real Quality Junior School — Kampala, Uganda')
@section('meta_description', 'Apply to Real Quality Junior School in Kampala, Uganda. Requirements, process, fees, and how to book a school tour for 2025.')
@section('og_title', 'Admissions | Real Quality Junior School')
@section('og_description', 'Join Real Quality Junior School — admissions process, requirements, and school tours. Kampala, Uganda.')

@section('content')
  <section class="page-hero page-hero--admissions" aria-labelledby="admissions-hero-title">
    <div class="container">
      <h1 id="admissions-hero-title" class="page-hero__title">Admissions</h1>
      <p class="page-hero__subtitle">Join the Real Quality Junior School family — 2025 intake open</p>
    </div>
  </section>

  <section class="container" aria-labelledby="welcome-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Welcome</p>
      <h2 id="welcome-heading">Applying to Real Quality Junior School</h2>
    </div>
    <div class="container--narrow fade-in" style="margin-inline: auto;">
      <p>We welcome applications for Nursery (Baby, Middle, Top) and Primary (P.1–P.7). Places are limited and we encourage early application. Below you will find our requirements, process, and how to arrange a visit.</p>
    </div>
  </section>

  <section class="container" id="requirements" aria-labelledby="requirements-heading">
    <div class="section-title fade-in">
      <p class="subtitle">What You Need</p>
      <h2 id="requirements-heading">Requirements</h2>
    </div>
    <div class="admissions-box fade-in">
      <ul>
        <li>Completed application form (available from the school office or via our <a href="{{ route('contact') }}">contact form</a>)</li>
        <li>Copy of the child's birth certificate</li>
        <li>Previous school reports (where applicable)</li>
        <li>Passport-size photograph of the child</li>
        <li>Medical form (provided by the school)</li>
      </ul>
      <p style="margin-top: var(--space-md);">
        <a href="{{ asset('documents/admissions-requirements.txt') }}" download class="btn btn--outline">
          Download file
        </a>
      </p>
    </div>
  </section>

  <section class="container" aria-labelledby="process-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Steps</p>
      <h2 id="process-heading">Admissions Process</h2>
    </div>
    <div class="card-grid">
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">1</div>
        <h3 class="feature-card__title">Enquire &amp; Visit</h3>
        <p class="feature-card__text">Get in touch or book a school tour. We love meeting families and showing you around our campus.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">2</div>
        <h3 class="feature-card__title">Submit Application</h3>
        <p class="feature-card__text">Complete the application form and submit it with the required documents to the school office or via email.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">3</div>
        <h3 class="feature-card__title">Assessment &amp; Offer</h3>
        <p class="feature-card__text">Where appropriate, we may invite your child for a short, friendly assessment. We then send an offer letter if a place is available.</p>
      </article>
      <article class="feature-card fade-in">
        <div class="feature-card__icon" aria-hidden="true">4</div>
        <h3 class="feature-card__title">Accept &amp; Enrol</h3>
        <p class="feature-card__text">Accept the offer, pay the required fees, and complete enrolment. We will guide you through every step.</p>
      </article>
    </div>
  </section>

  <section class="container" aria-labelledby="fees-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Fees</p>
      <h2 id="fees-heading">Fees &amp; Payment</h2>
    </div>
    <div class="admissions-box fade-in">
      <p>Please contact us for the current fee structure and payment options. We offer termly and annual payment plans and are happy to discuss flexible arrangements where needed. Fees cover tuition, basic materials, and use of facilities; additional costs may apply for trips and some activities.</p>
      <a href="mailto:info@realqualityjuniorschool.ug?subject=Fee%20Enquiry" class="btn btn--primary" style="margin-top: var(--space-md);">Request Fee Schedule</a>
    </div>
  </section>

  <section class="container" id="apply-online" aria-labelledby="apply-online-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Apply Online</p>
      <h2 id="apply-online-heading">Online Admission Form</h2>
    </div>
    <div class="admissions-box fade-in">
      <p>You can start your child's admission online. Fill in the form below and our admissions team will contact you to complete the process.</p>
      @if ($errors->any())
        <ul style="color: var(--color-danger, #b00020); margin-bottom: var(--space-md); padding-left: 1.25rem;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <form class="contact-info-card" action="{{ route('admissions.store') }}" method="post" aria-label="Online admission form">
        @csrf
        <div class="form-group">
          <label for="child-name">Child's Full Name</label>
          <input type="text" id="child-name" name="child_name" value="{{ old('child_name') }}" required placeholder="e.g. Amina Nakato">
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
        </div>
        <div class="form-group">
          <label for="class-applying">Class Applying For</label>
          <input type="text" id="class-applying" name="applying_class" value="{{ old('applying_class') }}" required placeholder="e.g. Top Class, P.1">
        </div>
        <div class="form-group">
          <label for="parent-name">Parent/Guardian Name</label>
          <input type="text" id="parent-name" name="parent_name" value="{{ old('parent_name') }}" required placeholder="e.g. John Ssekandi">
        </div>
        <div class="form-group">
          <label for="phone">Parent/Guardian Phone</label>
          <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+256 700 000 000">
        </div>
        <div class="form-group">
          <label for="email">Parent/Guardian Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com">
        </div>
        <div class="form-group">
          <label for="previous-school">Previous School (if any)</label>
          <input type="text" id="previous-school" name="previous_school" value="{{ old('previous_school') }}" placeholder="Previous school name">
        </div>
        <div class="form-group">
          <label for="notes">Additional Information</label>
          <textarea id="notes" name="notes" placeholder="Tell us anything we should know about your child (health, learning needs, interests, etc.)">{{ old('notes') }}</textarea>
        </div>
        <button type="submit" class="btn btn--primary">Submit Online Application</button>
      </form>
      <p style="margin-top: var(--space-md); font-size: var(--text-sm);">Note: Your details are saved in our admissions system. We will follow up with you to request any supporting documents.</p>
    </div>
  </section>

  <section class="container" id="tour" aria-labelledby="tour-heading">
    <div class="section-title fade-in">
      <p class="subtitle">Visit Us</p>
      <h2 id="tour-heading">School Tours</h2>
    </div>
    <div class="admissions-box fade-in">
      <p>We encourage every family to visit before applying. You can schedule a tour of the campus, meet the headteacher and staff, and see our classrooms and facilities. Virtual visits can also be arranged. Get in touch to book a date that suits you.</p>
      <a href="{{ route('contact') }}" class="btn btn--primary" style="margin-top: var(--space-md);">Book a Tour / Contact Us</a>
    </div>
  </section>

  <section class="container" aria-labelledby="cta-heading">
    <div class="cta-banner fade-in">
      <h2 id="cta-heading" class="cta-banner__title">Ready to Apply?</h2>
      <p class="cta-banner__text">Request a prospectus or start your application today. We look forward to welcoming you.</p>
      <a href="{{ route('contact') }}" class="btn btn--outline-light">Get in Touch</a>
    </div>
  </section>
@endsection
