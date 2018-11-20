@extends('layouts.app')

@section('content')
<section id="hero" class="container">
    <div id="hero-content">
        <div class="row py-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">LOAN SEARCH</h5>
                        <h6 class="card-subtitle mb-4">Find the best loan for your needs!</h6>
                        <div class="col-md-12">
                            <form method="GET" action="/search_offers">
                                @csrf
                                <select class="form-control" name="loan">
                                    <option value="">Select Loan Type</option>
                                    @foreach($loans as $loan)
                                    <option value="{{ $loan->slug }}">{{ $loan->type }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="classification">
                                    <option value="">Select Loan Classification</option>
                                    @foreach($classifications as $classification)
                                    <option value="{{ $classification->slug }}">{{ $classification->classification }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="amount" placeholder="Loan Amount">
                                <input type="number" class="form-control" name="term" placeholder="Terms (months)">
                                <button type="submit" class="btnLoanSearch btn btn-orange mt-5">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
</section>

<section class="my-5" id="loan-section">
    <div class="container px-5">
        <h5>TYPES OF LOAN</h5>
        <div class="row pt-2">
            <div class="col-md-4">
                <p>Business Loan</p>
                <p>Personal Loan</p>
                <p>OFW Loan</p>
                <p>Doctor's Loan</p>
            </div>
            <div class="col-md-4">
                <p>Car Loan</p>
                <p>Truck Loan</p>
                <p>OR/CR Refinancing Loan</p>
                <p>Motorcycle Loan</p>
            </div>
            <div class="col-md-4">
                <p>Housing Loan</p>
                <p>Microfinance Loan</p>
                <p>Credit Card</p>
                <p>Student Loan</p>
            </div>
        </div>
    </div>
</section>

<section class="my-5" id="description-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/phones.png" id="phoneTabs">
            </div>
            <div class="col-md-6">
                <p><strong>Through us, you can</strong></p>
                <p>- Apply loans to multiple Creditors with one application</p>
                <p>- Identify the real-time progress of loan</p>
                <p>- Choose from wide-range loan product selections</p>
                <p>- Assure information you provide is safe and secure</p>
                <p>- Apply anytime (24/7), anywhere using Web and Phone</p>


                <p class="pt-5">Start your hassle-free loan application today!</p>


            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <img src="images/convenient.png" class="home-icons">
                <p class="icons-label">Convenient</p>
                <p class="icons-message">We value your time. You don't need to go to Bank to apply for a loan. You can apply 24/7 anywhere using your web and phone</p>
            </div>
            <div class="col-md-4">
                <img src="images/faster.png" class="home-icons">
                <p class="icons-label">Fast</p>
                <p class="icons-message">You can easily identify the progress of your loan and directly communicate with the assigned Loan Officer to your application.</p>
            </div>
            <div class="col-md-4">
                <img src="images/secure.png" class="home-icons">
                <p class="icons-label">Secure</p>
                <p class="icons-message">Assure that all information you provided are secured in full compliance to the governing laws related hereto.</p>
            </div>
        </div>
    </div>
</section>

<section class="my-5" id="featured-section">
    <div class="container">
        <h5>FEATURED PROMO</h5>
        <div class="row">
            <div class="col-md-2">
                <img src="images/promo1.png">
            </div>
            <div class="col-md-2">
                <img src="images/promo1.png">
            </div>
            <div class="col-md-2">
                <img src="images/promo1.png">
            </div>
            <div class="col-md-2">
                <img src="images/promo1.png">
            </div>
            <div class="col-md-2">
                <img src="images/promo1.png">
            </div>
            <div class="col-md-2">
                <img src="images/promo1.png">
            </div>
        </div>
    </div>
</section>

<section class="my-5" id="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
                <h3 class="text-center my-5">TESTIMONIALS</h3>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <img class="rounded-circle float-left" src="images/boy.png">
                        <div class="float-none"></div>
                        <p class="ml-5"><i>"Bridge helps me boosting my funds. I got a new break for my company"</i></p>
                    </div>
                    <div class="col-md-6">
                        <img class="rounded-circle float-left" src="images/girl.png">
                        <p class="ml-5"><i>"Applying for a loan has never been this easy. Thanks to Bridge!."</i></p>
                    </div>
                </div>

                <div class="col-md-12 mt-5 text-center">
                    <p class="mb-2" id="expanding">We are expanding...</p>
                    <p>Bridge, a game-changer in the banking and finance industry, is eyeing to reach greatear heights as in envisions our country to be inclined to a better lending process in a safe and efficient way. This would not just help our country to have easy-access to financial products but help to improve credits standards and providing the best opportunities for them. Let us brace arms. Investors are called to make this happen. Hit the button and let's have it discussed over a coffee meeting</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
